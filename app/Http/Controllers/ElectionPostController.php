<?php

namespace App\Http\Controllers;

use App\ElectionPost;
use Illuminate\Http\Request;

class ElectionPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required'
        ]);

        $election_post = new ElectionPost;
        $election_post->title = $request->title;
        $election_post->election_id = $request->election_id;

        if($election_post->save()) {
            return redirect("/election/{$request->election_id}/config")->with('success', 'Saved Successfully');
        } else {
            return redirect("/election/{$request->election_id}/config")->with('error', 'Save Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ElectionPost  $electionPost
     * @return \Illuminate\Http\Response
     */
    public function show(ElectionPost $electionPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ElectionPost  $electionPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ElectionPost $electionPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ElectionPost  $electionPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElectionPost $electionPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ElectionPost  $electionPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElectionPost $electionPost)
    {
        //
    }
}
