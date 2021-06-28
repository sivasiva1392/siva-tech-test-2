<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tech;
class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tech = Tech::all();
        return $tech;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $tech = Tech::create($request->all());
        return response()->json([ 'tech' => $tech, 'message' => 'Tech Created Successfully' ], 201); 
        } catch (\Exception $e) {
            return response()->json(['message' => 'Tech Creation Failed!'], 409);
        }
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
        return $tech;
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
        try{
        $tech->update($request->all());
        return response()->json(['tech' => $tech, 'message' => 'Tech Update Successfully' ], 201); 
        } catch (\Exception $e) {
            return response()->json(['message' => 'Tech Updation Failed!'], 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $tech = Tech::destroy($id);
            return response()->json(['tech' => $tech, 'message' => 'Deleted sucessfully'], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Not Deleted!'], 409);
        }

    }


}
