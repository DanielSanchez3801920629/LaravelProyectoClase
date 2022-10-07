@extends('layouts.base')
@section('title', 'Grades')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-users"></i> &nbsp;Student Grades</h1>
        <table class="table table-bordered table-stripped">
            <thead>
                <th>Task Name</th>
                <th>Grade %</th>
                <th>Task Deadline</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{$grade->grade_name}}</td>
                    <td>{{$grade->grade_value_percentage}}%</td>
                    <td>{{$grade->grade_deadline}}</td>
                    <td><a href="{{route('grades.edit', $grade)}}" class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="{{route('grades.destroy', $grade)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Delete {{$grade->grade_name}}')">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col d-grid">
                <a href="/grades/create" class="btn btn-success">Create new grade</a>
            </div>
    </main>
@endsection