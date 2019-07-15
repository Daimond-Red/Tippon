<?php

namespace App\Basecode\Classes\Repositories;

use App\Emodule;
use App\EmoduleUser;
use App\Question;
use App\QuizScore;
use App\Reply;

class EmoduleRepository extends Repository {

    public $model = '\App\Emodule';

    public $viewIndex = 'admin.emodules.list';
    public $viewCreate = 'admin.emodules.create';
    public $viewEdit = 'admin.emodules.edit';
//    public $viewShow = 'admin.emodules.categories.show';

    public $storeValidateRules = [
        'name'          => 'required|unique:emodules,name',
        'start_date'    => 'required',
        'end_date'      => 'required|after:start_date',
    ];

    public $updateValidateRules = [
    ];

    public function getCollection($withFilters = true, $latest = true) {

        $model = new $this->model;

        if ($withFilters) {

            if(request('status') == 'complete') {
                $emoduleIds = $this->getCompletedEmodules()->pluck('emodule_id');
                $model = $model->whereIn('id', $emoduleIds);
            } elseif(request('status') == 'incomplete') {
                $emoduleIds = $this->getCompletedPendingEmodules()->pluck('emodule_id');
                $model = $model->whereIn('id', $emoduleIds);
            }

            if($id = request('user_id')) {
                $emoduleIds = $this->getCompletedPendingEmodules()->where('is_complete', 0)->pluck('emodule_id');
                $model = $model->whereIn('id', $emoduleIds);
            }

        }

        if($latest) $model = $model->orderBy('created_at', 'desc');

        return $model;
    }

    public function save($attrs) {

        $attrs = $this->getValueArray($attrs);

        $model = new $this->model;
        $model->fill($attrs);
        $model->save();

        if( $arr = request('users') ) {
            $userIds = explode(',', $arr);
            $model->users()->sync($userIds);
        }

        if(request('templates')) $model->templates()->sync(request('templates'));

        return $model;

    }

    public function update($model, $attrs = null)
    {
        if(! $attrs ) $attrs = $this->getAttrs();

        $model->fill($attrs);
        $model->update();

        if( request('userIds') ) {
            $userIds = explode(',', request('userIds'));
            if($userIds)$model->users()->attach($userIds);
        }

        if(request('templates')) $model->templates()->sync(request('templates'));
        elseif( array_key_exists('templates', request()->all()) ) $model->templates()->sync([]);

        return $model;

    }

    public function getAttrs() {
        $attrs = parent::getAttrs();

        $uploads = ['image'];

        foreach ( $uploads as $upload ) {
            if( request()->hasFile($upload) ){
                $attrs[$upload] = self::upload_file($upload, 'emodules');
            } elseif( $attrs && count($attrs) && array_key_exists($upload, $attrs) ) {
                unset($attrs[$upload]);
            }
        }

        return $attrs;
    }

    public function parseQuestionCollection($collection) {

        $records = [];

        foreach ($collection as $question) {

            $arr = [
                'question_id'   => $question->id,
                'title'         => $question->title,
                'marks'         => $question->marks,
            ];

            $answers = [];
            foreach( $question->answers_list()->get() as $answer ) $answers[] = [ 'answer_id' => $answer->id, 'title' => $answer->title ];
            $arr['answers_list'] = $answers;
            $records[] = $arr;

        }

        return $records;

    }

    public function getReplyCollection($withFilters = true) {

        $collection = new Reply();

        if( $withFilters ) {

            $whereFilters = ['emodule_id', 'question_id', 'answer_id', 'user_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

        }

        if( userHasChildUserCondition() ) $collection = $collection->whereIn('user_id', array_merge(\App\User::getChildUserIds(auth()->user()->id), [auth()->user()->id]));

        return $collection;

    }

    public function getQuestionCollection( $withFilters = true ) {

        $collection = new Question();

        if( $withFilters ) {

            $whereFilters = ['emodule_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

        }

        return $collection;

    }

    public function getEmoduleCompletedCount( $userId ) {
        return $this->getReplyCollection(false)->groupBy('emodule_id')->where('user_id', $userId)->count();
    }

    public function getAverageScore( $userId ) {

        $emoduleMarksTotal = $this->getQuestionCollection(false)->select('emodule_id', \DB::raw(' sum(marks) as sum'))->groupBy('emodule_id')->pluck('sum', 'emodule_id');

        $emoduleScoreMarksTotal = $this->getReplyCollection(false)->where('user_id', $userId)->select('user_id', \DB::raw(' sum(scoreMarks)  as sum'))->groupBy('user_id')->pluck('sum', 'user_id');

        $averageScore = ( array_sum($emoduleScoreMarksTotal->toArray()) * 100 ) / array_sum($emoduleMarksTotal->toArray());

        return $averageScore;

    }

    public function parseModel($model) {

        $arr = $model;

        $row = $templates = $mediaFiles = [];

        $row['emodule_id'] = (string)$arr->id;
        $row['name'] = (string)$arr->name;
        $row['image'] = (string)$arr->image;
        $row['created_at'] = (string)$arr->created_at;

        foreach( $arr->mediaFiles()->get() as $file ) $mediaFiles[$file->type][] = [
            'media_id'      => $file->id,
            'image'         => $file->image,
            'name'          => $file->name,
            'url'           => $file->url,
            'created_at'    => date('g:i A', strtotime($file->created_at))
        ];

        foreach( $arr->templates()->orderBy('id')->get() as $template ) {

            $templateArr = [ 'icon' => $template->icon, 'title' => $template->title, 'template_id' => $template->id ];

            if( $template->id == 1 ) { // intro template
                $templateArr['image'] = $arr->image;
                $templateArr['content'] = $arr->content;
            } elseif( $template->id == 3 ) { // quiz template

                if( request('user_id') ) {
                    $userId = decodeId(request('user_id'));
                    $questionIds = $this->getReplyCollection(false)->where('user_id', $userId)->pluck('question_id');
                    $templateArr['questions'] = $this->parseQuestionCollection($arr->questions()->whereNotIn('id', $questionIds)->get());
                } else {
                    $templateArr['questions'] = $this->parseQuestionCollection($arr->questions()->get());
                }

            } else {
                $files = [];
                if( isset($mediaFiles[$template->id]) ) $files = $mediaFiles[$template->id];
                $templateArr['media_files'] = $files;
            }

            $templates[] = $templateArr;

        }

        $row['templates'] = $templates;

        return $row;

    }

    public function updateEmoduleScore( $userId ) {

        $model = QuizScore::whereUserId($userId)->first();

        if(!$model) $model = new QuizScore;

        $model->user_id = $userId;
        $model->total_emodule = \DB::table('emodule_user')->whereUserId($userId)->count();
        $model->completed_module_count = \DB::table('emodule_user')->whereUserId($userId)->whereIsComplete(1)->count();
        $model->score = \DB::table('emodule_user')->whereUserId($userId)->whereIsComplete(1)->avg('score');

        $model->save();

    }

    public function getEmoduleUserCollection($withFilters = true) {

        $collection = new EmoduleUser();

        if($withFilters) {
            $whereFilters = ['emodule_id', 'user_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

            if( userHasChildUserCondition() ) $collection = $collection->whereIn('user_id', array_merge(\App\User::getChildUserIds(auth()->user()->id), [auth()->user()->id]));
            //if( userHasChildUserCondition() ) $collection = $collection->where('user_id', \App\User::getChildUserIds(auth()->user()->id));

        }

        return $collection;

    }

    public function getCompletedEmodules($withFilter = true) {

        $collection = $this->getEmoduleUserCollection()->select(
            'emodule_id',
            \DB::raw('COUNT(user_id) as total'),
            \DB::raw('sum(is_complete) as done'),
            \DB::raw('round(AVG(score)) as score')
        )->groupBy('emodule_id')
            ->havingRaw('total = done');

        if( $withFilter ) {

            $whereFilters = ['emodule_id', 'user_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

        }

        if( userHasChildUserCondition() ) $collection = $collection->whereIn('user_id', array_merge(\App\User::getChildUserIds(auth()->user()->id), [auth()->user()->id]));
        return $collection;

    }

    public function getCompletedPendingEmodules($withFilter = true) {

        $collection = $this->getEmoduleUserCollection()->select(
            'emodule_id',
            \DB::raw('COUNT(user_id) as total'),
            \DB::raw('sum(is_complete) as done'),
            \DB::raw('(COUNT(user_id)- sum(is_complete)) as pending'),
            \DB::raw('round(AVG(score)) as score')
        )->groupBy('emodule_id');

        if( $withFilter ) {

            $whereFilters = ['emodule_id', 'user_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

        }

        if( userHasChildUserCondition() ) $collection = $collection->whereIn('user_id', array_merge(\App\User::getChildUserIds(auth()->user()->id), [auth()->user()->id]));
        return $collection;

    }

}
