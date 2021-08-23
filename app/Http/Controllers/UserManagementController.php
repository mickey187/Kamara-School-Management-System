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
class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexUserAccount(){
        
        return view('admin.user_management.user_account_management');                        
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
        ->get(['users.user_id','name','role_name','email']);
     return response()->json($user_detail);
    }

    public function idGeneratorFun(){
        $fourRandomDigit = rand(1000,9999);
        $student = student::get(['student_id']);
        $employee = employee::get(['employee_id']);
        $parent = students_parent::get(['parent_id']);
        foreach($student as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        foreach($employee as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }foreach($parent as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }

        return $fourRandomDigit;
    }
}
