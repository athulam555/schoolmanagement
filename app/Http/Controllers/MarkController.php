<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    const term = [
        'one' => 'Term One',
        'two' => 'Term Two',
        'three' => 'Term Three'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markDatas = Mark::all();
        $term = self::term;
        return view('mark.index',compact('markDatas','term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $studentDatas = Student::all();
        $term = self::term;

        $id = $request->request->get('id');
        $mark = '';
        if ($id) {
            $mark = Mark::find($id);
        }
        return view('mark.form',compact('studentDatas','term','mark'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'student_id' => 'required',
            'maths_mark' => 'required',
            'science_mark' => 'required',
            'history_mark' => 'required',
            'term' => 'required'
        ]);

        if ($request->id) {
            $mark = Mark::find($request->id);
            $msg = 'updated';
        }else{
            $mark = new Mark();
            $msg = 'saved';
        }
        
        $mark->student_id = $request->request->get('student_id');
        $mark->maths_mark = $request->request->get('maths_mark');
        $mark->science_mark = $request->request->get('science_mark');
        $mark->history_mark = $request->request->get('history_mark'); 
        $mark->term = $request->request->get('term');
        $mark->total_mark = $mark->maths_mark + $mark->science_mark + $mark->history_mark ;
        $mark->save();

        return redirect()->route('mark.index')->with('success', 'Student Has Been '.$msg.' successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        //
    }
}
