<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    public $user;
    protected $users;

    public function __construct(User $users)
    {
        $this->middleware(function($request, $next){
           //$this->user = Auth::user();
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(is_null($this->users) || !$this->users->can('user.view')){
        //     abort(403, 'SORRY! You are unauthorized to access user list!');
        // }
        $query = $this->users->orderBy('created_at', 'desc');
        if ($request->search_status != null) {
            $query->where('status', $request->search_status);
        }
        $searchText = $request->search_text;
        if ($searchText != null) {
            // $query = $query->search($request->search_text); // search by value
            $query->where(function ($query) use ($searchText) {
                $query->where('name', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchText . '%');
            });
        }
        $users = $query->paginate(10);
        return view('users.index', compact('users'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(is_null($this->user) || !$this->user->can('user.create')){
        //     abort(403, 'SORRY! You are unauthorized to create new user!');
        // }
        $roles = Role::all();
        return view('users.create',[
            'roles' => $roles
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
        // if(is_null($this->users) || !$this->users->can('user.create')){
        //     abort(403, 'SORRY! You are unauthorized to create new user!');
        // }
        $request->validate(
            [
                 'name' =>'required|regex:/^[a-zA-Z ]+$/u|min:3|max:20',
                 'email' =>'required|min:3|email|max:20|unique:users',
                 'password' =>'required|min:6|confirmed', 
            ],
            [          
                'name.required' => 'User Name field is required.',
                'name.unique' => 'The User name has already been taken.',
                'name.regex' => 'The User name format is invalid. Please enter alpabatic text.',
                'name.min' => 'The User name must be at least 3 characters.',
                'name.max' => 'The User name may not be greater than 20 characters.'
            ]
        );
        $result = $this->users->insertUser($request);  
        if($result){
            Session::flash('success', 'User Created Successfully.');
        }else{
            Session::flash('error', 'User not created!');
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
        // if(is_null($this->users) || !$this->users->can('user.edit')){
        //     abort(403, 'SORRY! You are unauthorized to edit user!');
        // }
        $id = Crypt::decryptString($id);
        $user = $this->users->find($id);        
        $roles = Role::all();
        return view('users.edit',[
            'user' => $user,
            'roles' => $roles
        ]);
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
        // if(is_null($this->users) || !$this->users->can('user.edit')){
        //     abort(403, 'SORRY! You are unauthorized to edit user!');
        // }
        $id = Crypt::decryptString($id);
        $user = $this->users->find($id);
        $request->validate(
            [
                 'name'     =>'required|regex:/^[a-zA-Z ]+$/u|min:3|max:50', 
                 'email'    =>'required|min:3|email|max:20|unique:users,email,'.$id,
                 'password' =>'nullable|min:6|confirmed', 
            ],
            [          
                'name.required' => 'User Name field is required.',
                'name.unique'   => 'The User name has already been taken.',
                'name.regex'    => 'The User name format is invalid. Please enter alpabatic text.',
                'name.min'      => 'The User name must be at least 3 characters.',
                'name.max'      => 'The User name may not be greater than 20 characters.'
            ]
        );
        $result = $this->users->updateUser($request,$id);  
        if($result){
            Session::flash('success', 'User has been updated successfully.');
        }else{
            Session::flash('error', 'User not updated!');
        }        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(is_null($this->user) || !$this->user->can('user.delete')){
        //     abort(403, 'SORRY! You are unauthorized to delete user!');
        // }
        $id = Crypt::decryptString($id);
        $user = $this->users->find($id);
        if(!is_null($user)){
            $result = $user->delete();
        }
        if($result){
            Session::flash('success', 'User deleted Successfully.');
        }else{
            Session::flash('error', 'User not deleted!');
        }        
        return redirect()->back();
    }
}
