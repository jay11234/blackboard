@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Paper
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
        <form method="post" action="{{ route('papers.update', $paper->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $paper->name }} />
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <input type="text" class="form-control" name="description" value={{ $paper->description }} />
            </div>
             
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection