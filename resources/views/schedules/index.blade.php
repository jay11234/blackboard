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

    <a href="{{route('schedules.create')}}"><button class="btn btn-dark"> Add</button></a>
    <br><br>


    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>

                <td>Paper</td>

                <td>Day</td>
                <td>Begin</td>
                <td>End</td>
                <td>Strength</td>
                <td>Preview</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{$schedule->id}}</td>
                <td>
                    @php
                    $id = $schedule->paper_id;
                    $paper = DB::table('papers')->where('id',$id)->get();


                    foreach($papers as $paper)
                    {

                    if ($schedule->paper_id === $paper->id)
                    {
                    echo $paper->name;

                    }
                    }

                    @endphp
                </td>
                <td>
                    @if($schedule->day ==1)

                    Monday

                    @elseif($schedule->day ==2)

                    Tuesday

                    @elseif($schedule->day ==3)

                    Wednesday
                    @elseif($schedule->day ==4)

                    Thursday
                    @elseif($schedule->day ==5)

                    Friday
                    @elseif($schedule->day ==6)

                    Saturday

                    @endif

                </td>
                <td>{{$schedule->begin}}</td>
                <td>

                    {{$schedule->end}}

                </td>
                <td>{{$schedule->strength}}</td>
                <td>
                    @if($schedule->preview ==0)
                    
                    Required
                    @else
                    
                    Not Required
                    
                    @endif

                </td>
                <td class="form-inline">
                    <a href="{{ route('schedules.edit',$schedule->id)}}" class="btn btn-primary">Edit</a>

                    <form class=" " action="{{ route('schedules.destroy', $schedule->id)}}" method="post">
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