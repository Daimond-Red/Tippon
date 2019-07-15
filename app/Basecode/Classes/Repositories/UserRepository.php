<?php

namespace App\Basecode\Classes\Repositories;

use App\DcrScore;
use App\DeviceTokens;
use App\ParentUser;
use App\QuizScore;
use App\User;
// use Spatie\Permission\Models\Role;

class UserRepository extends Repository {

    public $dcrRepository, $emoduleRepository;

    public $model = '\App\User';

    // public function __construct( EmoduleRepository $emoduleRepository ) {
    //     $this->emoduleRepository = $emoduleRepository;
    // }

    public $viewIndex = 'admin.users.index';
    public $viewCreate = 'admin.users.create';
    public $viewEdit = 'admin.users.edit';
    public $viewShow = 'admin.users.show';

    public $storeValidateRules = [
        'name'          => 'required',
        'email'         => 'required|unique:users,email',
        'mobile_no'     => 'required|unique:users,mobile_no',
        // 'user_type'     => 'required|in:admin,phlebo,courier,sales,fe_connector'
    ];

    public $updateValidateRules = [
        'name'          => 'required',
        'email'         => 'required|unique:users,email',
        'mobile_no'     => 'required|unique:users,mobile_no',
        // 'user_type'     => 'required|in:admin,phlebo,courier,sales,fe_connector'
    ];

    public function updateDeviceToken($userId) {

        if (! request('device_id') ) return;

        $model = DeviceTokens::where('device_id', request('device_id'))->first();
        if(!$model) $model = new DeviceTokens;
        $model->fill(request()->all());
        $model->user_id = $userId;
        $model->save();
    }

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);
        $attrs['type'] = User::USER;
        
        try {
            \DB::beginTransaction();

            if( $pass = request('password') ) {
                $attrs['password'] = bcrypt($pass);
            } elseif( array_key_exists('password', $attrs) ) {
                unset($attrs['password']);
            }
            
            $model = new $this->model;
            $model->fill($attrs);
            $model->save();
            

            \DB::commit();

            return $model;
        } catch (\Exception $e) {
             echo $e->getMessage(); die;
            \DB::rollBack();
        }

    }

    public function find( $id ) {
        $model = $this->model;
        $model = $model::findOrFail($id);
        return $model;
    }

    public function update($model, $attrs = null) {

        if(! $attrs ) $attrs = $this->getAttrs();

        try{
            \DB::beginTransaction();

            if( $pass = request('password') ) {
                $attrs['password'] = bcrypt($pass);
            } elseif( array_key_exists('password', $attrs) ) {
                unset($attrs['password']);
            }

            $model->fill($attrs);

            $model->update();

            if( request('_id') ) {

                $role_id = decrypt(request('_id'));
                $role = Role::findById($role_id);

                $model->syncRoles($role);
                $model->syncPermissions(request('permissions', []));
                $model->zones()->sync(request('zones', []));

            }

            $this->updateDeviceToken($model->id);

            \DB::commit();
            return $model;

        } catch ( \Exception $e ) {
            \DB::rollBack();
         //   echo $e->getMessage();  die;
        }

    }

    public function getModel() {
        $model = new $this->model;
        return $model;
    }

    public function getCollection( $withFilters = true ) {

        $model = new $this->model;


        $model = $model->whereIn('type', [User::USER]);

        return $model;
    }

    public function parseModel($model) {

        $arr = [];
        $arr['user_id'] = (string) encrypt($this->prepare_field('id', $model));
        $arr['first_name'] = (string)$this->prepare_field('first_name', $model);
        $arr['last_name'] = (string)$this->prepare_field('last_name', $model);
        $arr['emp_id'] = (string)$this->prepare_field('emp_id', $model);
        $arr['email'] = (string)$this->prepare_field('email', $model);
        $arr['mobile_no'] = (string) $this->prepare_field('mobile_no', $model);
        $arr['image'] = (string)$this->prepare_field('image', $model);
        $arr['is_verified'] = (string)(int)$this->prepare_field('is_verified', $model);
        $arr['department'] = (string) $model->getRoleDepartmentDisplayNames();
        $arr['designation'] = (string) $model->getDesignationDisplayName();
        $arr['zone'] = (string) $model->getZoneNames();

        $arr['created_at'] = (string)$this->prepare_field('created_at', $model);

        return $arr;
    }

    public function import() {

        $csv = csvToArray(request()->file('file'));
        // dd($csv);
        try {
            \DB::beginTransaction();
            $errors = [];
            $i = 0;
            $zoneNamesString = '';
            $csvCount = count($csv);
            $k = 1;
            foreach ( $csv as $row ) {
                $stateNames[] = $row['STATE'];
                $headQuarterNames[] = $row['HEAD_QUARTER'];
                $zoneNamesString .= $row['ZONE']. ( $csvCount > $k++ ?  ',' : '');
            }
            $stateData = \App\State::whereIn('title', $stateNames)->pluck('id', 'title')->toArray();

            $headQuarterData = \App\HeadQuarter::whereIn('title', $headQuarterNames)->pluck('id', 'title')->toArray();

            $zoneData = \App\Zone::whereIn('title', explode(',', $zoneNamesString))->pluck('id', 'title')->toArray();
            
            foreach ( $csv as $entry ) {

                if(! isset($stateData[$entry['STATE']]) ) {
                    $errors[$i++]['message'] = "State( ". $entry['STATE'] ." ) name not found.";
                    continue;
                }

                $entry['STATE'] = $stateData[$entry['STATE']];

                if(! isset($headQuarterData[$entry['HEAD_QUARTER']]) ) {
                    $errors[$i++]['message'] = "HEAD QUARTER ( ". $entry['HEAD_QUARTER'] ." ) name not found.";
                    continue;
                }

                $entry['HEAD_QUARTER'] = $headQuarterData[$entry['HEAD_QUARTER']];

                $zones = explode(',', $entry['ZONE']);

                foreach ($zones as $zone) {

                    if(! isset($zoneData[$zone]) ) continue;

                    $zoneArr[] = $zoneData[$zone];
                }

                if(!isset($zoneArr)) {
                    $errors[$i++]['message'] = "Zone ( ". $entry['ZONE'] ." ) name not found.";
                    continue;
                }

                $entry['ZONE'] = implode(',', $zoneArr);

                $rules = [
                    'EMPID'             => 'required',
                    'NAME'              => 'required',
                    'MOBILE'            => 'required',
                    'EMAIL'             => 'required',
                    'PASSWORD'          => 'required',
                    'ACCOUNT_STATUS'    => 'required',
                    'IS_APP_ALLOWED'    => 'required',
                    'DEPARTMENT'        => 'required|exists:departments,tag',
                    'DESIGNATION'       => 'required|exists:roles,name',
                    'STATE'             => 'required|exists:states,id',
                    'HEAD_QUARTER'      => 'required|exists:head_quarters,id',
                    'ZONE'              => 'required|exists:zones,id',
                ];

                if( $err = cvalidate($rules, $entry) ){
                    $errors[$i++]['message'] = $err->first();
                    continue;
                }

                $model = User::where(function($q) use ($entry) {
                    $q->orWhere('emp_id', $entry['EMPID'])->orWhere('email', $entry['EMAIL'])->orWhere('mobile_no', $entry['MOBILE']);
                })->first();

                if($model) {
                    $errors[$i++]['message'] = "This employee (".$entry['EMPID'].") is already exists.";
                    continue;
                }

                if(!$model) {

                    $model = new $this->model;
                    $model->emp_id = $entry['EMPID'];
                    $model->email = $entry['EMAIL'];
                    $model->mobile_no = $entry['MOBILE'];

                    if( request('user_type') == 'phlebo') {
                        $model->type = \App\User::PHLEBO;
                    } elseif ( request('user_type') == 'sales') {
                        $model->type = \App\User::SALES;
                    } else {
                        $model->type = \App\User::COURIER;
                    }

                }

                $model->name = $entry['NAME'];
                $model->status = (bool)$entry['ACCOUNT_STATUS'];
                $model->is_allowed_for_app = $entry['IS_APP_ALLOWED'];
                $model->state = $entry['STATE'];
                $model->head_quarter = $entry['HEAD_QUARTER'];

                $model->save();

                if( $model && $model->id ) {

                    try {
                        $role = Role::findByName($entry['DESIGNATION']);
                        $model->assignRole($role);

                        $model->zones()->sync(explode(',', $entry['ZONE']));

                    } catch (\Exception $e) {
                        
                    }

                }

            }

            \DB::commit();
            return $errors;
        } catch (\Exception $e) {
            \DB::rollBack();
            session()->flash('errors', $e->getMessage());
        }

    }

    public function hierarchyMasterExport() {

    }

    public function hierarchyMasterImport() {

        $csv = csvToArray(request()->file('file'));

        $data = $empIds = [];
        foreach( $csv as $row ) {
            if ( $row['EmpCode'] ) $empIds[] = $row['EmpCode'];
            if ( $row['ManagerCode'] ) $empIds[] = $row['ManagerCode'];
        }

        $empData = User::whereIn('type', [User::SALES, User::PHLEBO, User::COURIER])->whereIn('emp_id', $empIds)->pluck('id', 'emp_id');

        try{
            foreach ( $csv as $row ) {

                $parentUser = ParentUser::where('user_id', $empData[$row['EmpCode']])->first();
                if(! $parentUser ) $parentUser = new ParentUser;
                $parentUser->user_id = $empData[$row['EmpCode']];
                $parentUser->parent_id = isset($empData[$row['ManagerCode']]) ? $empData[$row['ManagerCode']]: '';
                $parentUser->save();

            }
        } catch (\Exception $e) {

        }

    }

    public function findModelUsingCode($code) {

        $model = \App\Doctor::where('code', $code)->first();
        if($model) return $model;

        $model = \App\Hospital::where('code', $code)->first();
        if($model) return $model;

        $model = \App\Lab::where('code', $code)->first();
        if($model) return $model;

        $model = \App\CollectionCenter::where('code', $code)->first();
        if($model) return $model;

        return false;

    }

    public function scoreCollection( $withFilters = true ) {

        $collection = new QuizScore();
        if( $withFilters ) {

            $whereFilters = [ 'user_id'];
            foreach( $whereFilters as $filter ) {
                if( $value = request($filter) ) $collection = $collection->where($filter, trim($value));
            }

        }

        if( userHasChildUserCondition() ) $collection = $collection->whereIn('user_id', array_merge(\App\User::getChildUserIds(auth()->user()->id), [auth()->user()->id]));

        return $collection;

    }

    public function getRankCount($userId) {
        $res = $this->scoreCollection(false)->select(
            '*',
            \DB::raw(' FIND_IN_SET( score, ( SELECT GROUP_CONCAT( score ORDER BY score desc ) FROM quiz_scores ) ) AS rank ')
        )->whereUserId($userId)->first();
        if($res) return (int)$res->rank;
        return 0;
    }

    public function getScoreCount($userId) {
        $res = $this->scoreCollection(false)
            ->whereUserId($userId)
            ->first();
        if($res) return (int)$res->score;
        return 0;
    }

    public function dcrScoreCollection() {
        return new DcrScore();
    }
    /**
     * CURRENTLY WE ARE USING THIS IN API.
     */
    public function getDcrScoreCount( $userId ) {

        // $res = DcrScore::whereUserId($userId)->select('*', \DB::raw('COUNT(*) AS score'))->first();
        $res = \App\Activity::select('*', \DB::raw('COUNT(*) as score'))
            ->where('status', \App\Activity::DONE_STATUS)
            ->whereUserId($userId)->first();

        if($res) return (int)$res->score;

        return 0;

    }

    /**
     * CURRENTLY WE ARE USING THIS IN API.
     */
    public function getDcrRankCount( $userId ) {

        $res = \App\Activity::select('*', \DB::raw('COUNT(*) as rank'))
            ->where('status', \App\Activity::DONE_STATUS)
            ->whereUserId($userId)->first();

        if($res) return (int)$res->rank;

        return 0;

    }

    public function getEmoduleScoreCount($userId, $emoduleId) {

        $res = $this->emoduleRepository
            ->getReplyCollection()
            ->whereUserId($userId)
            ->whereEmoduleId($emoduleId)
            ->select( \DB::raw(' sum(marks) as totalMarks '), \DB::raw(' sum(scoreMarks) as scoreMarks ') )->first();

        if(! ($res->totalMarks || $res->scoreMarks) ) return 0;

        return ( $res->scoreMarks*100 )/$res->totalMarks;

    }

}
