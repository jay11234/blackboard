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

    <a href="{{route('papers.create')}}"><button class="btn btn-dark"> Add</button></a>
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
            @foreach($papers as $paper)
            <tr>
                <td>{{$paper->id}}</td>
                <td>{{$paper->name}}</td>
                <td>{{$paper->description}}</td>

                <td class="form-inline">
                <a href="{{ route('papers.edit',$paper->id)}}" class="btn btn-primary">Edit</a>

                    <form class=" " action="{{ route('papers.destroy', $paper->id)}}" method="post">
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