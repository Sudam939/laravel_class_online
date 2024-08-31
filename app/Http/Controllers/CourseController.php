<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function home()
    {
        $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function about()
    {
        return view('about');
    }

    public function store_course(Request $request)
    {

        $request->validate([
            "name" => "required|max:255",
            "price" => "required|integer",
            "syllabus" => "required",
            "image" => "required",
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->price = $request->price;
        $course->syllabus = $request->syllabus;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $course->image = "images/" . $fileName;
        }

        $course->save();

        return redirect()->route('home');
    }

    public function delete_course($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view("edit", compact('course'));
    }

    public function update_course(Request $request, $id)
    {

        $request->validate([
            "name" => "required|max:255",
            "price" => "required|integer",
            "syllabus" => "required",
        ]);

        $course = Course::find($id);
        $course->name = $request->name;
        $course->price = $request->price;
        $course->syllabus = $request->syllabus;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $course->image = "images/" . $fileName;
        }

        $course->update();

        return redirect()->back();
    }
}
