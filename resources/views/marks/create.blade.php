@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Add Mark
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
        <form method="post" action="{{ route('marks.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">ID:</label>
                <input type="text" class="form-control" name="id" />
            </div>
            <div class="form-group">
                <label for="price">Paper :</label>
                <input type="text" class="form-control" name="paper_id" />
            </div>
            <div class="form-group">
                <label for="quantity">Mark:</label>
                <input type="text" class="form-control" name="mark" />
            </div>
            <div class="form-group">
                <label for="quantity">Date:</label>
                <input type="text" class="form-control" name="when" />
            </div>
            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
</div>
@endsection