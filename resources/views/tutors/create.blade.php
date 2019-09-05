@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Add Tutor
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('tutors.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>
        
            <div class="form-group">
                <label for="quantity">Description:</label>
                <input type="text" class="form-control" name="description" />
            </div>
            
            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
</div>
@endsection