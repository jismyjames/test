<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mark;
use App\Models\Student;

class MarksController extends Controller
{
    public function index(Request $request)
    {
        $marks  = Mark::all();
        return view('mark', compact('marks'));
    }

    public function add(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate(
                [
                    'student_id' => 'required',
                    'term_id' => 'required',
                    'maths' => 'required|integer',
                    'science' => 'required|integer',
                    'history' => 'required|integer',
                ]
            );
            $mark = new Mark();
            $mark->total = ($request->maths + $request->science + $request->history);
            $mark->fill($request->all());
            $mark->save();
            return redirect(route('viewMark'))
                ->with('success', 'Mark successfully Added');
        } else {
            $model = new Mark;
            $students = Student::pluck('name', 'id');
            return view('addMark', ['model' => $model, 'students' => $students]);
        }
    }

    public function edit(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate(
                [
                    'student_id' => 'required',
                    'term_id' => 'required',
                    'maths' => 'required|integer',
                    'science' => 'required|integer',
                    'history' => 'required|integer',
                ]
            );
            $mark = Mark::find($request->id);
            $mark->total = ($request->maths + $request->science + $request->history);
            $mark->fill($request->all());
            $mark->update(); // returns false
            return redirect(route('viewMark'))
                ->with('success', 'Mark successfully Added');
        } else {
            $model = Mark::find($request->id);
            $students = Student::pluck('name', 'id');
            return view('editMark', ['model' => $model, 'students' => $students]);
        }
    }

    public function delete(Request $request)
    {
        Mark::find($request->id)->delete();
        return redirect()->back()
            ->with('success', 'Mark successfully deleted');
    }
}
