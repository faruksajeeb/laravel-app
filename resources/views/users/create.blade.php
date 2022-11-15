<x-app-layout>
    <x-slot name="title">
        Create User
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title py-1"><i class="fa fa-plus"></i> Create User</h3>
                        </div>
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb" class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('Users') }}">Users</a></li>
                                    <li class="breadcrumb-item " aria-current="page">Create</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body  p-3">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row  p-3">
                            <div class="col-md-5 border border-1  p-3">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="text" name='name' value="{{old('name')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">User Email</label>
                                    <input type="text" name='email' value="{{old('email')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name='password' value="{{old('password')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name='password_confirmation' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="roles">Assign Roles</label>
                                    <select name="roles[]" id="" class="form-control select2" multiple required>
                                        @foreach ($roles as $role)                                            
                                            <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                {{-- <div class="form-group">
                                    <label for="" class="fw-bolder">User Permissions</label>
                                    <br>
                                    <label class="checkbox select-all-permission">
                                        <input type="checkbox" name="permission_all" id="permission_all">
                                        All
                                    </label>

                                    <hr>
                                    @foreach ($permission_groups as $groupIndex => $permission_group)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="permission_group{{ $groupIndex }}"
                                                    class="checkbox group-permission {{ $permission_group->group_name}}"  onclick="checkPermissionByGroup('{{$permission_group->group_name}}')">
                                                    <input type="checkbox" class="group"
                                                        name="group-permission[]">
                                                    {{ ucfirst($permission_group->group_name) }}

                                                </label>
                                            </div>
                                            <div class="col-md-8">
                                                @php
                                                    $groupWisePermissions = \DB::table('permissions')
                                                        ->where('group_name', $permission_group->group_name)
                                                        ->get();
                                                @endphp
                                                <ul>
                                                    @php
                                                        $permissinCount = count($groupWisePermissions);
                                                    @endphp
                                                    @foreach ($groupWisePermissions as $index => $permission)
                                                        <li
                                                            class="@php echo ($index+1<$permissinCount) ? 'border-bottom':'' @endphp  p-2">
                                                            <label class="checkbox single-permission per-{{ $permission_group->group_name}}" onclick="checkUncheckModuleByPermission('per-{{$permission_group->group_name}}', '{{ $permission_group->group_name}}', {{count($groupWisePermissions)}})">
                                                                <input type="checkbox"  value="{{$permission->name}}" name="permission[]" id="permission{{ $permission->id}}">
                                                                {{ ucwords(str_replace('.',' ',$permission->name)) }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                        @php echo ($groupIndex+1<count($permission_groups)) ? '<hr>':'' @endphp
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>

                        <br />
                        <div class="form-group">
                            <button type="submit" name="submit-btn" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {

            });
       
        </script>
    @endpush
</x-app-layout> 
