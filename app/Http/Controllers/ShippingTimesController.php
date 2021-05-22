<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingTime;

class ShippingTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShippingTime::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shippingTime = new ShippingTime();

        $shippingTime->task = $request['task'];
        $shippingTime->user = $request['user'];

        $shippingTime->delivered_app = $request['delivered_app'];
        $shippingTime->viewed_app = $request['viewed_app'];
        $shippingTime->sent_sms = $request['sent_sms'];
        $shippingTime->delivered_sms = $request['delivered_sms'];

        $shippingTime->state = $request['state'];

        $shippingTime->save();
        return $shippingTime;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ShippingTime::find($id);
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
        $shippingTime = ShippingTime::find($id);

        $shippingTime->task = $request['task'];
        $shippingTime->user = $request['user'];

        $shippingTime->delivered_app = $request['delivered_app'];
        $shippingTime->viewed_app = $request['viewed_app'];
        $shippingTime->sent_sms = $request['sent_sms'];
        $shippingTime->delivered_sms = $request['delivered_sms'];

        $shippingTime->state = $request['state'];

        $shippingTime->save();
        return $shippingTime;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippingTime = ShippingTime::find($id);
        if ($shippingTime) {
            return "This shippingTime was deleted";
        } else {
            return "This shippingTime was deleted erlier";
        }
    }
}
