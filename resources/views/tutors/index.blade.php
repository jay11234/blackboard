@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    <a href="{{route('tutors.create')}}"><button class="btn btn-dark"> Add</button></a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>

                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tutors as $tutor)
            <tr>
                <td>{{$tutor->id}}</td>
                <td>{{$tutor->name}}</td>
                <td>{{$tutor->description}}</td>
                <td class="form-inline">
                    <a href="{{ route('tutors.edit',$tutor->id)}}" class="btn btn-primary">Edit</a>

                    <form class=" " action="{{ route('tutors.destroy', $tutor->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @endsection