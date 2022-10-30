<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    public function index(Request $request){
        $teachers  = Teacher::all();
        return view('teacher', compact('teachers'));
    }

    public function add(Request $request){
        if ($request->method()=="POST") {
            $request->validate(
                [
                    'name'=>'required|string|max:20',
                ]
            );
            $teacher = new  Teacher();
            $teacher->fill($request->all());
            $teacher->save(); // returns false
            return redirect(route('viewTeacher'))
                ->with('success', 'Teacher successfully Added');
        } else {
            $model = new Teacher;
            return view('addTeacher', ['model'=>$model]);
        }

    }
}
