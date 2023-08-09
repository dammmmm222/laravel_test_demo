<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;

use App\Models\students;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $student = students::all();
        return StudentResource::collection($student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //tao khách hàng mới
        $student = students::create($request->all());
//        trả về thông vừa thêm
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = students::find($id);
        if($student){
            return new StudentResource($student);
        }
        else{
            return response()->json(['message'=>'Sinh viên không tồn tại'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = students::find($id);
        if($student){
            $student->update($request->all());
        }else{
            return response()->json(['message'=>'Sinh viên không tại'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = students::find($id);
        if($student){
            $student->delete();
            return response()->json(['message'=>'xoá thành công']);
        }
        else{
            return response()->json(['message'=>"khong ton tai user"],404);
        }
    }
}
