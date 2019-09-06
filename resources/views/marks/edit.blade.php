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
        <form method="post" action="{{ route('marks.update', $mark->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="paper_id">Paper:</label>

                <select name="paper_id">

                    @foreach($papers as $paper)
                    @if($paper->paper_id == $mark->paper_id)
                    <option value="{{ $paper->id }}" name="paper_id"   selected>{{ $paper->name }}</option>
                    @else
                    <option value="{{ $paper->id }}" name="paper_id"  >{{ $paper->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="assignment">Assignment:</label>
                <input type="text" class="form-control" name="assignment" value={{ $mark->assignment }} />
            </div>
            <div class="form-group">
                <label for="name">Mark:</label>
                <input type="text" class="form-control" name="mark" value={{ $mark->mark }} />
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