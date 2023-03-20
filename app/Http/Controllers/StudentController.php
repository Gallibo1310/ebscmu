<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    // index page student list
    public function student()
    {

        $students = Student::all();
        return view('student.student',compact('students'));
    }



    // index page student grid
    public function studentGrid()
    {
        return view('student.student-grid');
    }

    // student add page
    public function studentAdd()
    {
        return view('student.add-student');
    }

    /** student save record */
    public function studentSave(Request $request)
    {

        DB::beginTransaction();
        try {


            $student = new Student();
            $student->firstname = $request->firstname;
            $student->middlename = $request->middlename;
            $student->lastname = $request->lastname;
            $student->address = $request->address;
            $student->contact = $request->contact;
            $student->birthday = $request->birthdate;
            $student->sex = $request->sex;
            $student->yearlevel = $request->yearlevel;
            $student->status = 'Active'; //Active  request
            $student->idnumber = $request->idnumber;

            $student->save();

            Toastr::success('Has been add successfully :)','Success');
            DB::commit();
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('An error occurred: '.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    /** view for edit student */
    public function studentView($id)
    {
        $studentEdit = Student::where('id',$id)->first();
        return view('student.edit-student',compact('studentEdit'));
    }


     /** student Update */
     public function studentUpdate(Request $request)
     {

      DB::beginTransaction();
         try {
                $student = Student::find($id);
                $student->firstname = $request->firstname;
                $student->middlename = $request->middlename;
                $student->lastname = $request->lastname;
                $student->address = $request->address;
                $student->contact = $request->contact;
                $student->birthday = $request->birthday;
                $student->sex = $request->sex;
                $student->yearlevel = $request->yearlevel;
                $student->status = $request->status;
                $student->idnumber = $request->idnumber;

                $update=[
                    'firstname' =>$firstname,
                    'middlenam'=>$middlenam,
                    'lastname' =>$lastname,
                    'address' =>$address,
                    'contact' =>$contact,
                    'birthday' =>$birthday,
                    'sex' =>$sex,
                    'yearlevel'=>$yearlevel,
                    'status' =>$status,
                    'idnumber'  =>$idnumber
                ];


                DB::commit();

                Toastr::success('Student updated successfully :)','Success');
                return redirect()->back();
            } catch(\Exception $e) {
                DB::rollback();
                Toastr::error('An error occurred: '.$e->getMessage(), 'Error');
                return redirect()->back();
            }
     }

      /** user delete */
    public function studentDelete($id)
    {
        try{
            $student = Student::findOrFail($id);
            $this->authorize('delete', $student);
            Toastr::success('Student deleted successfully :)','Success');
                 return redirect()->back();
        }
        catch(\Exception $e) {
            DB::rollback();
            Toastr::error('An error occurred: '.$e->getMessage(), 'Error');
            return redirect()->back();
        }

    }



}
