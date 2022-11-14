<x-app-layout>
    <x-slot name="title">
        Roles
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title py-1"><i class="fa fa-list"></i> Roles</h3>
                        </div>
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb" class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <form action="" method="GET">
                            <input type="hidden" name="_token" value="B7Tuv4nPCe86gWsjastnnmhS3EQPF2a7rOxWV7IA">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <select name="search_status" class="form-select" id="search_status">
                                        <option value="">Select Status</option>
                                        <option value="7">Active
                                        </option>
                                        <option value="-7">Inactive
                                        </option>
                                        <option value="-1">Deleted
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 px-0">
                                    <div class="input-group">
                                        <input type="text" name="search_text" value="" class="form-control"
                                            placeholder="Search by text">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary mx-1" name="submit_btn" type="submit"
                                                value="search">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                            <button class="btn btn-xs btn-success float-end" name="submit_btn"
                                                value="export" type="submit">
                                                <i class="fa-solid fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <a href="{{ route('roles.create') }}" class="btn btn-xs btn-outline-primary float-end"
                                        name="create_new" type="button">
                                        <i class="fa-solid fa-plus"></i> Create New
                                    </a>
                                </div>

                            </div>
                        </form>
                        <table class="table text-nowrap text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->guard_name }}</td>
                                        <td>{{ $val->created_at }}</td>
                                        <td>{{ $val->updated_at }}</td>
                                        <td>

                                            <button class="btn btn-sm btn-success me-1 mt-1 edit_modal_btn"
                                                id="edit_btn_row_{{ $val->id }}"
                                                op_id="{{ Crypt::encryptString($val->id) }}"
                                                {{ $val->status == -7 || $val->status == -1 ? 'disabled' : '' }}
                                                title="Edit"><i class="fa-solid fa-file-pen"></i></button>
                                            <button class="btn btn-sm btn-danger mt-1 del_btn"
                                                op_id="{{ Crypt::encryptString($val->id) }}" title="Delete"
                                                {{ $val->status == -1 ? 'disabled' : '' }}><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
