<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workplace;

class WorkplacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workplaces = Workplace::all(); 
        $data = [];
        foreach($workplaces as $workplace) {
            $users = $workplace->users('work_place')->get();
            array_push($data, compact(
                'workplace',
                'users'
            ));
        }
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workplace = new Workplace();
        $workplace->name = $request['name'];
        $workplace->save();
        return $workplace;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Workplace::find($id);
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
        $workplace = Workplace::find($id);
        $workplace->name = $request['name'];
        $workplace->save();
        return $workplace;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workplace = Workplace::find($id);
        if ($workplace) {
            $workplace->delete();
            return "This workplace was deleted";
        } else {
            return "This workplace was deleted erlier";
        }
    }
}
