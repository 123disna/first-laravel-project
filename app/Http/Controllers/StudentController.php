<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Inertia\Inertia;
use domain\Facades\StudentFacade;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
   {
      $students = StudentFacade::all();
      return view('pages.students.std_list', ['students' => $students]);
   }

   public function create()
   {
     return view('pages.students.create');
   }

   public function store(Request $request)
   {

       StudentFacade::store($request);
       return redirect()->route('students.index')->with('success', 'Student created successfully.');
   }

   public function edit($id)
   {
        $student = StudentFacade::edit($id);
        return view('pages.students.edit', ['student' => $student]);
   }

   public function update(Request $request, $id)
    {
        StudentFacade::update($request, $id);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

  public function destroy($id)
  {
    StudentFacade::destroy($id);
    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
  }

  public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $student = Student::findOrFail($id);

        $student->status = $request->status;
        $student->save();

        return response()->json(['message' => 'Student status updated successfully.']);
    }

}
