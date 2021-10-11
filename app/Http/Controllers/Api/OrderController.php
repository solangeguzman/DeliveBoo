<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $newOrder = new Order();
        $output = "";
        $this->fillAndSave($newOrder, $data);

        foreach ($data['dish'] as $dish) {
            $newOrder->dish()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        }




        return response('status:ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OrderResource(Order::find($id));
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
        $data = $request-> all();
        $order = Order::find($id);
        $order -> status = $data['status'];
        $order->save();
        return response('status: ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function orderRestaurant($id)
    {
        $allOrder = Order::all();
        $trueOrder = [];
        foreach ($allOrder as $order) {
            if ($order->dish[0]->restaurant['id'] == $id) {
                $trueOrder[] = $order;
            }
        }
        return OrderResource::collection($trueOrder);
    }

    public function fillAndSave(Order $order, $data)
    {
        $order->customer_name = $data['name'];
        $order->customer_surname = $data['surname'];
        $order->customer_address = $data['address'];
        $order->customer_email = $data['email'];
        $order->customer_phone = $data['phone'];
        $order->total_price = $data['price'];
        $order->status = $data['status'];
        $order->discount = $data['discount'];
        $order->notes = $data['notes'];
        $order->save();
    }
}
