<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student ;
class StudentController extends Controller
{
    public function addStudent(){
        return view('add-student');
    }
    ///Store information 
    public function storeStudent(Request $request){
        $name = $request->name ;
        $image = $request->file('file');///file theke image ta nilam
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName) ; /// public folder er name er vitor images name er ekta folder create hbe

        $student = new Student() ; /// student type object here 
        $student->name = $name ;
        $student->profileimage = $imageName ;
        $student->save() ;

        return back()->with('student_added' , 'Student added successfully!');
    }
    public function sudents(){
        $students = Student::all() ;
        return view('all-student',compact('students'));
    }
    public function editStudent($id){
        $student = Student::find($id);
        return view('edit-student', compact('student'));
    }
    public function update(Request $request){
        $name = $request->name ;
        $image = $request->file('file');///file theke image ta nilam
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName) ; /// public folder er name er vitor images name er ekta folder create hbe

        $student = Student::find($request->id) ; /// student type object here 
        $student->name = $name ;
        $student->profileimage = $imageName ;
        $student->save() ;

        return back()->with('student_updated' , 'Student updated successfully!');
    }
    public function viewStudent($id){
        $student = Student::find($id);
        return view('view-student', compact('student'));
    }
    public function deleteStudent($id){
        Student::where('id' , $id)->delete() ;
        //return back()->with('post_deleted', 'Post has been deleted successfully!');
    }
}
