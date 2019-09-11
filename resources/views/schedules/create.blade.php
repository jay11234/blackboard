@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Add Schedule
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
        <form method="post" action="{{ route('schedules.store') }}">
            @csrf



            <div class="form-group">
                <label for="paper_id">Paper:</label>
                <select class="form-control" name="paper_id" id="paper_id">
                    @foreach($papers as $paper)
                    <option value="{{ $paper->id }}">{{ $paper->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="day">Day:</label>
                <select name="day" id="day" class="form-control">
                    <option value="1">Monday</option>
                    <option value="1">Tuesday</option>
                    <option value="1">Wednesday</option>
                    <option value="1">Thursday</option>
                    <option value="1">Friday</option>
                    <option value="1">Saturday</option>

                </select>

            </div>
            <div class="form-group">
                <label for="begin">Begin:</label>
                <input type="text" class="form-control timepicker" name="begin" />
            </div>
            <div class="form-group">
                <label for="end">End:</label>
                <input type="text" class="form-control timepicker " name="end" />
            </div>
            <div class="form-group">
                <label for="strength">Strength:</label>
                <input type="text" class="form-control  " name="strength" />
            </div>
            <div class="form-group">
                <label for="preview">Preview:</label>
                <select name="preview" id="preview" class="form-control">
                    <option value="1">Required</option>
                    <option value="0">Not Required</option>
                

                </select>
            </div>

            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script type="text/javascript">
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '10',
        maxTime: '6:00pm',
        defaultTime: '11',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>
@endsection