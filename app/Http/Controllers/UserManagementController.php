<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\role_user;
use App\Models\employee;
use App\Models\student;
use App\Models\students_parent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function defaultUser(){
        return view('auth.login');
    }

    public function indexUserAccount(){

        $roles = Role::all();

        return view('admin.user_management.user_account_management')->with('roles',$roles);
    }

    public function addRole($role_name){

        $status = null;



        if (Role::where('role_name','LIKE','%'.$role_name.'%')->exists()) {
            $status = "already exists";
            return response()->json($status);
        }

        elseif (!Role::where('role_name','LIKE','%'.$role_name.'%')->exists()) {

            $role = new Role();
            $role->role_name = $role_name;

             if ($role->save()) {
            $status = "success";
            return response()->json($status);
        }
        else{
            $status = "failed";
            return response()->json($status);
        }
        }


    }

    public function viewRole(){
        $role = Role::all();
        return response()->json($role);
    }

    public function createAccount($user_name, $email, $role_id, $password){
        $status = null;
        if (User::where('email',$email)
            ->where('name',$user_name)->exists()) {

            $status = "user already exists";
            return response()->json($status);
        }

        elseif (!User::where('email',$email)
            ->where('name',$user_name)->exists()) {

                $user = new User();
                $user->user_id = $this->idGeneratorFun();
                $user->name = $user_name;
                $user->email = $email;
                $user->password = Hash::make($password);
                if ($user->save()) {
                    $role_user = new role_user();
                    $role_user->user_id = $user->id;
                    $role_user->role_id = $role_id;
                    if ($role_user->save()) {
                        $status = "success";
                        return response()->json($status);
                    }
                }
        }
    }
    public function viewUserAccount(){
        $user_detail = DB::table('role_user')
        ->join('users','role_user.user_id','=','users.id')
        ->join('roles','role_user.role_id','=','roles.id')
        ->get(['users.user_id','name','role_name','email','roles.id as role_id']);
     return response()->json($user_detail);
    }

 

    public function idGeneratorFun(){
        global $idArray;
        $fourRandomDigit = rand(100000,999999);
        $student = student::all();
        $employee = employee::all();
        $parent = students_parent::all();
        foreach($student as $row){
            if($row->student_id == $fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        foreach($employee as $row){
            if($row->employee_id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }foreach($parent as $row){
            if($row->parent_id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }

        return $fourRandomDigit;
    }

    public function updateUserAccount(Request $req){
        
        $user = null;
        $validator = null;
        
        if (User::where('user_id',$req->user_id)->exists()) {
            $user = User::where('user_id',$req->user_id)->first();
            error_log("hellllllllllllllllllo");
            $validator = Validator::make($req->all(),[
                'new_username'=>"required|unique:users,name,$user->name,name",
                'new_email'=>"required|email|unique:users,email,$user->email,email",
                'new_role'=>'required'
                
            ]);

        if($validator->passes()){
            $user->name = $req->new_username;
            $user->email = $req->new_email;
            
            if ($user->save()) {
                return response()->json(['validation_status'=>null,"update_status"=>"success"]);
            }
           

           }
           else {
               return response()->json(['validation_status'=>$validator->errors(),"update_status"=>"failed"]);
           }
        }

        else {
            error_log("hellllllllllllllllllo".$req->user_id);
            return response()->json(['validation_status'=>null,"update_status" => null]);
        }
        
        
        // return response()->json(['status'=>$validator->errors()->all()]);
    }

    public function userPassword(Request $req){

        $user_detail = DB::table('role_user')
                            ->join('roles','role_user.role_id','=','roles.id')
                            ->join('users','role_user.user_id','=','users.id')
                            ->where('users.user_id',$req->user_id)
                            ->get(['name','email','role_name','users.user_id as user_account_id','users.id as user_table_id'])
                            ->first();
                           
        return view('admin.user_management.change_user_password')->with('user_detail',$user_detail);
    }

    public function changeUserPassword(Request $req){



            if (DB::table('users')
            ->where('users.id',$req->user_table_id)
            ->update(['password' => Hash::make($req->new_password)])) {
                return "success";
            }
           
    }
}
