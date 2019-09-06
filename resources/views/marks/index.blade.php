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

    <a href="{{route('marks.create')}}"><button class="btn btn-dark"> Add</button></a>
    <br><br>


    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>

                <td>Paper</td>

                <td>Assignment</td>
                <td>Mark</td>
                <td>When</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
            <tr>
                <td>{{$mark->id}}</td>
                <td>
                    @php $id = $mark->paper_id;  @endphp
                    @php $paper = DB::table('papers')->where('id',{{$id}})->get(); @endphp

                    {{$paper->name}}
                    <!-- @foreach($papers as $paper)
                        @if ($mark->paper_id == $paper->paper_id)
                            {{$paper->name}}
                        @endif
                    
                    @endforeach -->
                </td>
                <td>{{$mark->assignment}}</td>
                <td>{{$mark->mark}}</td>
                <td>{{$mark->when}}</td>
                <td class="form-inline">
                    <a href="{{ route('marks.edit',$mark->id)}}" class="btn btn-primary">Edit</a>

                    <form class=" " action="{{ route('marks.destroy', $mark->id)}}" method="post">
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