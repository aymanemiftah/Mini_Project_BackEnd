<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::select('id','prenom','nom','age')->get();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            "prenom"=>'required',
            "nom"=>'required',
            "age"=>'required|max:2',
        ]);
        Student::create($request->post());
        return response()->json(['message'=>'student add seccessfuly']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json([
            'student'=>$student
        ]);
    }

   
    public function update(Request $request, Student $student)
    {
        $request->validate([
            "prenom"=>'required',
            "nom"=>'required',
            "age"=>'required|max:2',
        ]);
        $student->fill($request->post())->save();
        return response()->json(['message'=>'student Updated seccessfuly']);
    }

    
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message'=>'student Deleted seccessfuly']);
    }
}
