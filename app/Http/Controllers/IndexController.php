<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= Student::paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        try {
            $students = Student::create([
                'first_name' => $request -> first_name,
                'last_name' => $request -> last_name,
                'email' => $request -> email,
                'address' => $request -> address,
                'gender' => $request -> gender,
                'department_id' => $request ->department_id

            ]);
            // $student = new Student();
            // $student->first_name = $request->first_name;
            // $student->last_name = $request->last_name;
            // $student->email = $request->email;
            // $student->address = $request->address;
            // $student->gender = $request->gender;
            // $student->department_id = $request->department_id;
            if ($students) {
                session()->flash('success_message', 'Student information added successfully');
                return redirect()->route('students.index');
            }
            session()->flash('error_message', 'Something went wrong, please try again');
            return redirect()->route('students.create');


        } catch (\Exception $th) {
            session()->flash('error_message',$th->getMessage());
            return redirect()->route('students.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::find($id);
        return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.edit')->with('id not found');
        }
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->gender = $request->input('gender');
        $student->department_id = $request->input('department_id');
        $student->save();
        // // dd($students);
        // $student->update($request->all());
        return redirect()->route('students.index')->with('Student information updated successfully');
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        // return redirect()->route('students.index');

        if ($students) {
            session()->flash('success_message', 'Student information deleted successfully');
            return redirect()->route('students.index');
        } else {
            # code...
        }


    }
}
