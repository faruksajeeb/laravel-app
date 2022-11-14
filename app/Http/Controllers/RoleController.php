<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    protected $roles;

    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $all_roles_in_database = Role::all()->pluck('name');
        // $roles = $this->roles->all();
        $query = $this->roles->orderBy('created_at', 'desc');
        if ($request->search_status != null) {
            $query->where('status', $request->search_status);
        }
        $searchText = $request->search_text;
        if ($searchText != null) {
            // $query = $query->search($request->search_text); // search by value
            $query->where(function ($query) use ($searchText) {
                $query->where('name', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('guard_name', 'LIKE', '%' . $searchText . '%');
            });
        }
        $roles = $query->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permission_groups =Permission::select('group_name')->groupBy('group_name')->get();
        return view('roles.create', [
            'permissions' => $permissions,
            'permission_groups' => $permission_groups, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate(
            [
                'name' => 'required|regex:/^[a-zA-Z ]+$/u|min:3|max:20|unique:roles',
            ],
            [
                'name.required' => 'Role Name field is required.',
                'name.unique' => 'The role name has already been taken.',
                'name.regex' => 'The role name format is invalid. Please enter alpabatic text.',
                'name.min' => 'The role name must be at least 3 characters.',
                'name.max' => 'The role name may not be greater than 20 characters.'
            ]
        );
        $data = array(
            'name' => $request->name
        );
        
        $result = $this->roles->create($data); 
        if ($result) {
            Session::flash('success', 'Role Inserted Successfully.');
        } else {
            Session::flash('error', 'Role not inserted!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
