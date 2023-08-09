@extends('templates.layout')
@section('content')

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã số </th>
                <th>Tên sinh viên</th>
                <th>số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Giới tính</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($liststudent as $student)
            <tr>   
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->gender == 1? 'Nam': 'Nữ' }}</td>
                <td><img src="{{$student->image? Storage::url($student->image): ''}}" style="width: 100px; height: 100px"></td>
                <td>
                    <a href="{{ route('edit-student', ['id' => $student->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="{{ route('delete-student', ['id' => $student->id]) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
