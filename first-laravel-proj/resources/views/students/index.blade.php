@extends('layouts.base')
@section('title', 'Students')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-users"></i> &nbsp;Students list</h1>
        <table class="table table-bordered table-stripped">
            <thead>
                <th>ID</th>
                <th>ID Document</th>
                <th>Code</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->document}}</td>
                    <td>{{$student->code}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->birthdate}}</td>
                    <td><a href="{{route('students.show', $student)}}" class="btn btn-info">Show</a></td>
                    <td><a href="{{route('students.edit', $student)}}" class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="{{route('students.destroy', $student)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Delete {{$student->name}}')">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col d-grid">
                <a href="/students/create" class="btn btn-success">Create new student</a>
            </div>
    </main>
@endsection