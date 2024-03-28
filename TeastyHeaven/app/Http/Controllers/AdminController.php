<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function empMng(){

        $employees = Employee::get();

        return view('admin.empMng',['employees' => $employees]);
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
    public function tblres(){
        $res = reservation::all();

        return view('admin.tblmng',['res' => $res]);

    }
    public function appoved($id){
        $data = reservation::find($id);
        $data->status = 'Apprroved';
        $data-> save();
        return redirect()->back();

    }

    public function canceled($id){
        $data = reservation::find($id);
        $data->status = 'Canceled';
        $data-> save();
        return redirect()->back();

    }

}
