<?php

namespace App\Http\Controllers;
use App\Models\address;
use App\Models\classes;
use App\Models\section;
use App\Models\student;
use App\Models\students_parent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ParentController extends Controller{

    public function index(){
        $parent_list = students_parent::all();
        return view('admin.parent.view_parent')->with('parent_list',$parent_list);
    }

    public function insert($id){
        $this->insertAddress();
        $this->insertParent($id);
        $parent_list = students_parent::where('student',$id)->get();
        $student = student::where('id',$id)->first();
        return view('admin.parent.view_student_and_parent')->with('parent_list',$parent_list)->with('student',$student);
    }

    public function retrive($id){
        $student = student::where('id',$id)->first();

        $parent_list = students_parent::where('student',$id)->get();
        // $parent_list = DB::table('students_parents')
        // ->join('addresses','addresses.id','=','students_parents.address_id')
        // ->where('students_parents.id',$id)
        // ->get();
        //echo $parent_list;
        //$parent_address = address::where($parent_list->address_id);
        //$class = classes::where('id',$student->class_id)->first();


        // if($class){
        //     $section = section::where('id',$class->section_id)->first();
        //     return view('admin.parent.view_student_and_parent')->with('student',$student)->with('class',$class)->with('section',$section)->with('parent_list',$parent_list);
        // }else{
        //     return view('admin.parent.view_student_and_parent')->with('student',$student)->with('parent_list',$parent_list);
        // }


         return view('admin.parent.view_student_and_parent',compact('student'))->with('parent_list',$parent_list);
    }

    public function retriveAll(){
        $parent_list = students_parent::all();
        return view('admin.parent.view_parent')->with('parent_list',$parent_list);
    }

    public function delete($id){

        $parent_list = students_parent::where('id',$id)->get()->first();
        $student = student::where('id',$parent_list->student)->first();
        $address = address::find($parent_list->address_id);
        $address->delete();
        $parent_list->delete();
        return redirect()->route('studentParentList',$student->id)->withSuccessMessage('Successfully added');
    }

    public function addMore($student_id){
        $id = $student_id;
        return view('admin.parent.add_parent')->with('id',$id);
    }

    public function update($id){
        $edit = students_parent::find($id);
        $sub =array();
        $sub['first_name']=request('firstName');
        $sub['middle_name']=request('middleName');
        $sub['last_name']=request('lastName');
        $sub['gender']=request('gender');
        $sub['relation']=request('pRelation');
        $sub['school_closure_priority']=request('School_Closure_Priority');
        $sub['emergency_contact_priority']=request('pEmergency');
        $edit->update($sub);
        $edit->save();


        $addressEdit = address::find($edit->address_id);
        $subAdd =array();
        $subAdd['city']=request('city');
        $subAdd['subcity']=request('subcity');
        $subAdd['kebele']=request('kebele');
        $subAdd['p_o_box']=request('p_o_box');
        $subAdd['email']=request('email');
        $subAdd['phone_number']=request('phone1');
        $subAdd['alternative_phone_number']=request('phone2');
        $subAdd['house_number']=request('houseNumber');
        $addressEdit->update($subAdd);
        $addressEdit->save();
        return redirect()->route('listParent')->withSuccessMessage('Successfully Updated');
    }

    public function editPage($id){
        $update_address = DB::table('students_parents')->join('addresses','students_parents.address_id','=','addresses.id')->where('students_parents.address_id',$id)->first();
        $parent_update_list = students_parent::where('id',$id)->first();
        return view('admin.parent.add_parent')->with('parent_update_list',$parent_update_list)->with('update_address',$update_address);
    }

    public function insertAddress(){
        $address = new Address();
        $address->city = request('city');
        $address->subcity = request('subcity');
        $address->email = request('email');
        $address->kebele = request('kebele');
        $address->p_o_box = request('p_o_box');
        $address->phone_number = request('phone1');
        $address->alternative_phone_number = request('phone2');
        $address->house_number = request('houseNumber');
        $address->save();

    }

    public function insertParent($id){
        // echo request('firstName');
        $address_fk = Address::latest('created_at')->pluck('id')->first();
        $student_fk = $id;
        $parent = new students_parent();
        $parent->first_name = request('firstName');
        $parent->middle_name = request('middleName');
        $parent->last_name = request('lastName');
        $parent->gender = request('gender');
        $parent->relation = request('pRelation');
        $parent->school_closur_priority = request('School_Closure_Priority');
        $parent->emergency_contact_priority = request('pEmergency');
        $parent->address_id = $address_fk;
        $parent->student = $student_fk;
        $parent->save();
    }
}
