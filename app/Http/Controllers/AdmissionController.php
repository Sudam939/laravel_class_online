<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function admission()
    {
        $courses = Course::all();
        $admissions = Admission::all();
        return view('admission', compact('courses','admissions'));
    }

    public function store_admission(Request $request)
    {

        $request->validate([
            "name" => "required|max:255",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "course" => "required",
        ]);

        $admission = new Admission();
        $admission->name = $request->name;
        $admission->email = $request->email;
        $admission->phone = $request->phone;
        $admission->address = $request->address;
        $admission->course_id = $request->course;
        $admission->save();
        return redirect()->back();
    }
}
