<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //
    public function indexAddRole(){

        //$user = User::find(1);
       // return $user->roles;
        // foreach ($user->roles as $role) {
        //     //
        //     echo $role;
        // }
        return view('admin.add_role');
    }

    public function addRole(Request $req){
        $role = new Role();
        $role->role_name = $req->rolename;
        
        if ($role->save()) {
           // $view_role = Role::all();
           // return redirect()->route('viewrole')->with('view_role',$view_role);
            return $role->id;
           
        }
    }

    public function viewRole(){
        $view_role = Role::all();

        return view('admin.view_role')->with('view_role',$view_role);
    }

    public function editRole(Request $req, $id){

        $edit_role = Role::find($id);

        return view('admin.add_role')->with('edit_role',$edit_role);

       

    }

    public function editRoleValue(Request $req, $id){

        $edit_role = Role::find($id);
        $edit_role->role_name = $req->rolename;
        if ($edit_role->save()) {
           $view_role = Role::all();
           
           return redirect()->route('viewrole')->with('view_role',$view_role);
        }
    }

    public function deleteRole(Request $req){

        $role_id = $req->delete_btn;
        $role = Role::find($role_id);

        if ($role->delete()) {

            $view_role = Role::all();
           return redirect()->route('viewrole')->with('view_role',$view_role);
        }

        else 

        echo "couldn't delete please try again";
        
    }
}
