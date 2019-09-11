<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Carbon;
use App\Paper;

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
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules','papers'));
    }
    public function listInJson()
    {
        $schedules = Schedule::all();
        return response()->json($schedules, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers = Paper::all();
        return view('schedules.create', compact('papers'));
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
            'begin' => \Carbon\Carbon::parse($request->get('begin')),
            'end' => \Carbon\Carbon::parse($request->get('begin')),
            'strength' => $request->get('strength'),
            'preview' => $request->get('preview')
        ]);
        $schedule->save();
        return redirect('/schedules')->with('success', 'Schedule has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        return response()->json($schedule, 200);
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
        $papers = Paper::all();
        return view('schedules.edit', compact('schedule', 'papers'));
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
        return redirect('/schedules')->with('success','Schedule has been updated');
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
        return redirect('/schedules')->with('success','Schedule has been deleted');
    }
}
