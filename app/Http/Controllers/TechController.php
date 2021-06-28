<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tech;
use Validator;



class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tech = Tech::all();
        return view('tech.index', compact('tech'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tech.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
             'tech_name' => 'required',

            'description' => 'required',
        ]);

        $input = $request->all();

        Tech::create($input);

        return redirect()->route('tech.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tech = Tech::findOrFail($id);
        return view('tech.show', compact('tech'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tech = Tech::find($id);
        
        return view('tech.edit', compact('tech'));
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
        $tech = Tech::findOrFail($id);

        $this->validate($request, [
             'tech_name' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        $tech->update($input);

        return redirect()->route('tech.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tech = Tech::findOrFail($id);

        $tech->delete();
        
        return redirect()->route('tech.index');
    }
}
