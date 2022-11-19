<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    const teacher = [
        'manu_sir' => 'Manu Sir',
        "arun_sir" => 'Arun Sir',
        "midhun_sir" => 'Midhun Sir',
        "amal_sir" => 'Amal Sir'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentDatas = Student::all();
        $teacher = self::teacher;
        return view('student.index', compact('studentDatas', 'teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->request->get('id');
        $student = '';
        if ($id) {
            $student = Student::find($id);
        }
        $teacher = self::teacher;
        return view('student.form', compact('student', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required'
        ]);
        if ($request->id) {
            $student = Student::find($request->id);
            $student->fill($request->post())->save();
            $msg = 'updated';
        } else {
            Student::create($request->post());
            $msg = 'saved';
        }

        return redirect()->route('student.index')->with('success', 'Student Has Been '.$msg.' successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success','Student has been deleted successfully');
    }
}
