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
            @csrf
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="id" />
            </div>
            <div class="form-group">
                <select>
                    @foreach($papers as $paper)
                    <option value="{{ $paper->id }}" name="paper_id">{{ $paper->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="assignment">Assignment:</label>
                <input type="text" class="form-control" name="assignment" />
            </div>
            <div class="form-group">
                <label for="mark">Mark:</label>
                <input type="text" class="form-control" name="mark" />
            </div>
            <div class="form-group">
                <label for="when">Date:</label>
                <input id="when" type="text" class="form-control" name="when">

            </div>
            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#when").datepicker();

    });
</script>
@endsection