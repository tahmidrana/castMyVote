<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'my_elections' => Election::where('created_by', Auth::id())->orderBy('id', 'desc')->get()
        ];
        return view('election.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('election.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'title' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required'
        ]);

        $election = new Election;
        $election->title = $request->title;
        $election->description = $request->description;
        $election->start_datetime = $request->start_datetime;
        $election->end_datetime = $request->end_datetime;
        $election->created_by = Auth::id();

        if($election->save()) {
            return redirect('/home')->with('success', 'Saved Successfully');
        } else {
            return redirect('/election/create')->with('error', 'Save Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }

    public function config(Election $election)
    {
        $data = [
            'election' => $election
        ];
        return view('election.config', $data);
    }
}
