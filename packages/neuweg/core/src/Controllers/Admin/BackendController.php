<?php

namespace Neuweg\Core\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Neuweg\Core\Repositories\Repository as Repository;
use Neuweg\Core\Permissions\Permission as Permission;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BackendController extends Controller
{
    use AuthenticatesUsers;

    public $repository, $permission;

    public function __construct(
        Repository $repository,
        Permission $permission
    ) {
        $this->repository = $repository;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(! $this->permission->index()) return noAuth();

        if( \request('export') == 'csv' ) {
            $this->repository->exportCsv();
        }
        $collection = $this->repository->getPaginated(15);
        
        $allModelIds = $collection->pluck('id')->toArray();

        return view($this->repository->viewIndex, [
            'collection' => $collection,
            'repository' => $this->repository,
            'permission' => $this->permission,
            'allModelIds' => $allModelIds
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        if(! $this->permission->create() ) return noAuth();;

        return view($this->repository->viewCreate, [
            'repository' => $this->repository,
            'permission' => $this->permission,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if(! $this->permission->create() ) return noAuth();;

        $request->validate( getValidationRules($this->repository->storeValidateRules));

        $this->repository->save($this->repository->getAttrs());

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        if(! $this->permission->show() ) return noAuth();;

        $model = $this->repository->find($id);

        return view($this->repository->viewShow, [
            'model'         => $model,
            'repository'    => $this->repository,
            'permission' => $this->permission,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        if(! $this->permission->edit() ) return noAuth();;

        $model = $this->repository->find($id);
        
        return view($this->repository->viewEdit, [
            'model'         => $model,
            'repository'    => $this->repository,
            'permission' => $this->permission,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if(! $this->permission->edit() ) return noAuth();

        $model = $this->repository->find($id);

        $request->validate( getValidationRules($this->repository->updateValidateRules, $model));

        $this->repository->update($model);

        return $this->repository->redirectBackWithSuccess($this->repository->update_msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        if(! $this->permission->destroy() ) return noAuth();

        $model = $this->repository->find($id);

        $this->repository->delete($model);

        return $this->repository->redirectBackWithSuccess($this->repository->delete_msg);

    }

}
