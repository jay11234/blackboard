<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Paper::all();
        return view('schedules.index', compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $schedule = new Schedule([
            'paper_id' => $request->get('paper_id'),
            'day' => $request->get('day'),
            'begin' => \Carbon\Carbon::parse($request->get('begin'))->format('d/m/Y'),
            'end' => \Carbon\Carbon::parse($request->get('begin'))->format('d/m/Y'),
            'strength' => $request->get('strength'),
            'preview' => $request->get('preview')
        ]);
        $schedule->save();
        return view('/schedules')->with('success', 'Schedule has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shedule = Schedule::find($id);
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $schedule = Schedule::find($id);
        $schedule->paper_id = $request->get('paper_id');
        $schedule->day = $request->get('day');
        $schedule->begin = \Carbon\Carbon::parse($request->get('begin'))->format('d/m/Y');
        $schedule->end = \Carbon\Carbon::parse($request->get('begin'))->format('d/m/Y');
        $schedule->strength = $request->get('strength');
        $schedule->preview = $request->get('preview');
        $schedule->save();
        return view('schedules')->with('success','Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return view('/schedules')->with('success','Schedule has been deleted');
    }
}
