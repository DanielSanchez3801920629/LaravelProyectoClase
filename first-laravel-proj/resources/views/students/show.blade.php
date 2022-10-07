@extends('layouts.base')
@section('title', "Students | {$student -> name} {$student -> lastname}" );

@section('container')
<main class="container">
    <div class="row">
        <h1 class="alert alert-success text-center"> <i class="fa-solid fa-user-graduate"></i> {{$student->name}} {{$student->lastname}}</h1>
    </div>
    <div class="row" style="display: flex; align-items: center; justify-content: center;">
        <div class="card" style="width: 18rem; align-items: center;">
            <i style="font-size: 10rem; padding-top: 2rem; padding-bottom: 2rem;" class="fa-solid fa-person"></i>
            <div class="card-body" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <h5 class="card-title">{{$student->name}} {{$student->lastname}}</h5>
                <p class="card-text">Name: {{$student->name}}</p>
                <p class="card-text">Birth date: {{$student->birthdate}}</p>
                <p class="card-text">Code: {{$student->code}}</p>
                <p class="card-text">ID: {{$student->document}}</p>
                <p class="card-text">Email: {{$student->email}}</p>
            </div>
        </div>
        <div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Value Percentage</th>
                        <th scope="col">Value</th>
                        <th scope="col">Update Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->grades as $grade)
                    <tr>
                        <td>{{$grade->grade_name}}</td>
                        <td>{{$grade->grade_deadline}}</td>
                        <td>{{$grade->grade_value_percentage}}%</td>
                        <form action="{{isset($grade->pivot) 
                                        ? "/students/{$student->id}/grade-student/{$grade->pivot->id}" 
                                        : "/students/{$student->id}/grade-student"}}" method="POST">
                            @csrf
                            @isset($grade->pivot)
                            @method('PUT')
                            @endisset
                            <input hidden type="number" value="{{$grade->id}}" name="grade_id">
                            <td>
                                <input type="number" value="{{isset($grade->pivot) ? $grade->pivot->grade_value : '0'}}" name="grade_value" class="form_control" step="0.1">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-file-pen"></i>Update
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</main>

@endsection