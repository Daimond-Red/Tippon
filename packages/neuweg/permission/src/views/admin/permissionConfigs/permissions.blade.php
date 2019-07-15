<label class="form-control-label">Permission List</label>

@if( isset($role) )
    {{ Form::hidden('_id', encrypt($role->id)) }}
@endif

@if( isset($permissions)  && $permissions && count($permissions) )

    <div class="check-box">
        <ol>
            @foreach ( \Neuweg\Permission\Models\PermissionGroup::orderBy('id', 'desc')->get() as $model )
                <li>
                    <p class="text-primary">{{ $model->name }}</p>
                    @foreach( $model->options as $optionModel )
                        <div class="">
                            <label>
                                <input type="checkbox" <?php  if( in_array( $optionModel->name, $permissionNames ) ) echo 'checked';  ?> name="permissions[]" value="{{ $optionModel->name }}">
                                <span style="margin-left:7px;" class="mrgn-3-xs display-ib">{{  $optionModel->display_name }}</span>
                            </label>
                        </div>
                    @endforeach
                </li>
            @endforeach
        </ol>
    </div>

@else
    <p class="mrgn-all-none">No Menus Found</p>
@endif
