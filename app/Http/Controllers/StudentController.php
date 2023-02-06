<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all students frm the DB
        $students = Student::latest()->paginate(5);

        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we call this so that tthe Create student button at student.index blacde may know what to return
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the variables from the student.create blade form,
        $request->validate([
            'adm_no'=>'required |numeric |min:1',
            'fullnames' => 'required',
            'course' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $newImageName = time() . '-' . $request->input('adm_no') . '.' .$request->photo->extension();

        //move image to public/image folder

        $request->photo->move(public_path('images'),$newImageName);



        //save to the db, other data plus the image name
        Student::create([
            'adm_no'=> $request->adm_no,
            'fullnames'=>$request->fullnames,
            'course'=> $request->course,
            'photo'=> $newImageName
        ]);



        // return to home with a message
        return redirect()->route('students.index')
                        ->with('success','New student has  been created successfully');
}






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //array of all the inputs from the edit form
        $input = $request->all();


        //validate image only when image is set else do not validate

        if($request->file('photo')!==null)
        {
            $request->validate([
                'adm_no'=>'required |numeric |min:1',
                'fullnames' => 'required',
                'course' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            //make the new image name
            $newImageName = time() . '-' . $input['adm_no'] . '.' .$request->photo->extension();


            //move image to public/image folder
            $request->photo->move(public_path('images'),$newImageName);

            //we update the data

            $student->update([
                'adm_no'=>$input['adm_no'],
                'fullnames'=>$input['fullnames'],
                'course'=>$input['course'],
                'photo' => $newImageName
            ]);

            //return with a success message
            return redirect()->route('students.index')
            ->with('success','Student updated successfully');
        }
        else{
            //we do not want to update image,
            // only validate other inputs
            $request->validate([
                'adm_no'=>'required |numeric |min:1',
                'fullnames' => 'required',
                'course' => 'required',
            ]);

            //we update the validated data

            $student->update([
                'adm_no'=>$input['adm_no'],
                'fullnames'=>$input['fullnames'],
                'course'=>$input['course']
            ]);

            //return with a success message
            return redirect()->route('students.index')
            ->with('success','Student updated successfully');

            //we update the data

            $student->update([
                'adm_no'=>$input['adm_no'],
                'fullnames'=>$input['fullnames'],
                'course'=>$input['course']
            ]);

            //return with a success message
            return redirect()->route('students.index')
            ->with('success','Student updated successfully');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        //$student->delete();
        $id=$student->id;
        Student::where('id',$id)->delete();

        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
