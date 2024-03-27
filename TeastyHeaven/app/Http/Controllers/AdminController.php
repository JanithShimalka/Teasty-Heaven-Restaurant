<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function empMng(){
        return view('admin.empMng');
    }
    public function empSave(Request $request){

        $name = $request['name'];
        $role = $request['role'];
        $gender = $request['gender'];
        $hrs = $request['hrs'];
        $phone = $request['phone'];

        //Validation Start
        $validator = \Validator::make($request->all(), [

            
                'name'  =>   'required|max:80',
                'hrs'    =>   'required',
                'phone'    =>   'required',
    
            ], [
                'name.required' =>  'Name should be provided!',
                'name.max'  =>  'Name must be less than 80 characters long.',

                'phone.required' =>  'Phone Number should be provided!',
                
    
                'hrs.required'   =>  'Hrs should be provided!'
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
    
    //Validation End

    $save=new Employee();

    $save->name = $name;
    $save->role = $role;
    $save->gender = $gender;
    $save->hrs = $hrs;
    $save->phone = $phone;

    $save->save();
    return response()->json(['success'=>'Employee Saved']);
    
    }
}
