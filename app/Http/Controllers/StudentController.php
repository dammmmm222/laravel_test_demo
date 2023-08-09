<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{   
    //
    public function index(Request $request){
        $title = "Danh sách";
        $students = new students;
        $liststudent = $students::all();
        return view('student.list',compact('title','liststudent'));
    }
    public function add(StudentRequest $request){
        $title = "Thêm sinh viên";  
        if($request->isMethod('POST')){
            if($request->hasFile('image') && $request->file('image')->isValid()){

                $image = uploadFile('image', $request->file('image'));
            }
            $params = $request->except('_token', 'image');
                $params['image'] = $image;
            $student = students::create($params);
            if($student->id){
                Session::flash('success','Thêm sinh viên thành công');
            }
        }
        return view('student.add', compact('title'));
    }
    public function edit(Request $request, $id) {
        $title = 'Sửa thông tin học sinh';
        //cach 1:
        $student = DB::table('students')->where('id',$id)->first();
        //code update
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //xoa anh cu khi post anh moi
                $resultDL = Storage::delete('/public/'.$student->image);
                if($resultDL){
                    $request->image = uploadFile('image', $request->file('image'));
                    $params['image'] = $request->image;
                }
            }else{
                //neu khong thay hinh thi van se giu nguyen anh cu
                $params['image'] = $student->image;
            }
            $result = students::where('id', $id)->update($params);
            if($result){
                Session::flash('success', 'Sua khach hang thanh cong');
                //chuyen trang sau khi thanh cong
                return redirect()->route('list');
            }
        }
        return view('student.edit',compact('title', 'student'));
    }
    public function delete(Request $request,$id){
        $studentDl = students::where('id',$id)->delete();
        if($studentDl){
            Session::flash('success',"Xóa thành công");
            return redirect()->route('list');
        }
    }
}

