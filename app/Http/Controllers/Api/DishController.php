<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\Http\Resources\DishResource;

class DishController extends Controller
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
        $data = $request->all();


        $newDish = new Dish();
        $this->fillAndSave($newDish, $data);

        return response('status: ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allDishes = Dish::where('restaurant_id', $id)->get();
        
        return DishResource::collection($allDishes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->all();
        $dish = Dish::find($id);

        $this->fillAndSave($dish, $data);

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
        $dish = Dish::find($id);

        $dish->delete();

        return response('status: ok');
    }

    public function fillAndSave(Dish $dish, $data)
    {
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->ingredients = $data['ingredients'];
        $dish->course_id = $data['course_id'];
        $dish->restaurant_id = $data['restaurant_id'];
        $dish->save();
    }
}
