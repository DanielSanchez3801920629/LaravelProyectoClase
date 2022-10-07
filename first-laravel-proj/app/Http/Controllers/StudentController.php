<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StudentRequest;
use App\Models\Grade;
use App\Models\GradeStudent;

use function PHPUnit\Framework\returnSelf;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //
        
        $student = new Student;

        $student->code = $request->input('code');
        $student->document = $request->input('document');
        $student->name = $request->input('name');
        $student->lastname = $request->input('lastname');
        $student->birthdate = $request->input('birthdate');
        $student->email = $request->input('email');

        $student->save();

        return redirect('/students', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $grades = Grade::all()->merge($student->grades);
        //
        $student->grades = $grades;

        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::find($id);
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        //
        
        $student = Student::find($id);

        $student->code = $request->input('code');
        $student->document = $request->input('document');
        $student->name = $request->input('name');
        $student->lastname = $request->input('lastname');
        $student->birthdate = $request->input('birthdate');
        $student->email = $request->input('email');

        $student->save();

        return redirect('/students');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();

        return back();
    }

    function associateStudentGrade(Request $request, Student $student){
        $student->grades()->attach($request->input('grade_id'),[
            'grade_value' => $request->input('grade_value')
        ]);

        return back();
    }

    function updateStudentGrade(Request $request, Student $student, GradeStudent $gradeStudent) {
        $gradeStudent->update([
            'grade_value' => $request->input('grade_value')
        ]);
        return back();
    }
}
