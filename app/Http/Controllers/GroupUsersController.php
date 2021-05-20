<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupUser;

class GroupUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GroupUser::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groupUser = new GroupUser();
        $groupUser->group = $request['group'];
        $groupUser->user = $request['user'];
        $groupUser->save();
        return $groupUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return GroupUser::find($id);
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
        $groupUser = GroupUser::find($id);
        $groupUser->group = $request['group'];
        $groupUser->user = $request['user'];
        $groupUser->save();
        return $groupUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupUser = GroupUser::find($id);
        if ($groupUser) {
            $groupUser->delete();
            return "This groupUser was deleted";
        } else {
            return "This groupUser was deleted erlier";
        }
    }
}
