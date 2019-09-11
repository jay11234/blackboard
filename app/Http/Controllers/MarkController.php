<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Paper;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        $papers = Paper::all();
        
        return view('marks.index', compact('marks','papers'));
    }
    public function listInJson()
    {
        $marks = Mark::all();
        return response()->json($marks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers = Paper::all();
        return view('marks.create', compact('papers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date("Y-m-d", strtotime($request->get('when')));
        $mark = new Mark([
            'mark' => $request->get('mark'),
            'when' => $date,
            'assignment'=>$request->get('assignment'),
            'paper_id' => $request->get('paper_id')
        ]);
        $mark->save();
        return redirect('/marks')->with('succes', 'Mark has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);
        return response()->json($mark, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);
        $papers = Paper::all();
        return view('marks.edit', compact('mark','papers'));
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
        $mark = Mark::find($id);
        $date = date("Y-m-d", strtotime($request->get('when')));
        $mark->mark = $request->get('mark');
        $mark->paper_id = $request->get('papers');
        $mark->when = $date;
        $mark->assignment=$request->get('assignment');
        $mark->save();
        return redirect('/marks')->with('success', 'Mark has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();
        return redirect('/marks')->with('success', 'Mark has been deleted');
    }
}
