@extends('layouts.base')
@section('title', 'Create a new grade')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-users"></i> &nbsp;Create a new grade</h1>
        <form method="POST" action="{{route('grades.store')}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="grade_name" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="grade_name" id="grade_name"
                               aria-describedby="grade_name" value="{{old('grade_name')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="grade_value_percentage" class="form-label">Grade Percentage</label>
                        <input type="text" class="form-control" name="grade_value_percentage" id="grade_value_percentage"
                               aria-describedby="grade_value_percentage" value="{{old('grade_value_percentage')}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="grade_deadline" class="form-label">Task Deadline</label>
                        <input type="datetime-local" class="form-control" name="grade_deadline" id="grade_deadline"
                               aria-describedby="grade_deadline" value="{{old('grade_deadline')}}">
                    </div>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </main>
@endsection