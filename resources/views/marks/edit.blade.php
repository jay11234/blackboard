@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Mark
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
        <form method="post" action="{{ route('marks.update', $share->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Mark:</label>
                <input type="text" class="form-control" name="mark" value={{ $mark->mark }} />
            </div>
            <div class="form-group">
                <label for="price">Paper :</label>
                <input type="text" class="form-control" name="paper_id" value={{ $mark->paper_id }} />
            </div>
            <div class="form-group">
                <label for="quantity">When :</label>
                <input type="text" class="form-control" name="when" value={{ $mark->when }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection