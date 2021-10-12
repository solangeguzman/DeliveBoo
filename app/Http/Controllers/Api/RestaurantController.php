<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Http\Resources\RestaurantResource;

class RestaurantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response           //TO DO COMANDO SEARCH API
     */
    public function index()
    {
        $allRestaurants = Restaurant::all();

        return RestaurantResource::collection($allRestaurants);

        // return response()->json($this->example);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request);
        $data = $request->all();

        $newRestaurant = new Restaurant();
        $this->fillAndSave($newRestaurant, $data);
        $newRestaurant->category()->attach($data['category_id']);
        return response('status: ok');
    }

    /**
     * Display the specified resource.
     *     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new RestaurantResource(Restaurant::find($id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
        $restaurant = Restaurant::find($id);

        $this->fillAndSave($restaurant, $data);
        $restaurant->category()->sync($data['category_id']);
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
        $restaurant = Restaurant::find($id);

        $restaurant->delete();

        return response('status: ok');
    }

    public function fillAndSave(Restaurant $restaurant, $data)
    {
        $restaurant->name = $data['name'];
        $restaurant->address = $data['address'];
        $restaurant->save();
    }

    public function userRestaurant($id)
    {
        $restaurant = Restaurant::where('user_id', 'like', $id)->get();
        return  RestaurantResource::collection($restaurant);
    }
}
