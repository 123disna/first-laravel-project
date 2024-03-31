<?php

namespace domain\Services;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentService
{
    public function all()
    {
        $students = Student::all();
        return $students;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'age' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'public/images/';
            $file->move($path, $filename);

            $student = new Student();
            $student->name = $request->name;
            $student->image = $path.$filename;
            $student->age = $request->age;
            $student->status = $request->status;
            $student->save();
        }

    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return $student;
    }

    public function update(Request $request, $id)
    {


        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->status = $request->status;

        if ($request->hasFile('image')) {

            $student->image = $request->file('image')->store('images', 'public');
        }

        $student->save();
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
}
