<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function research($name)
    {
        // $allRestaurant = Restaurant::all();
        // $trueRestaurant = [];
        // foreach ($allRestaurant as $restaurant) {
        //     if (str_contains($restaurant->name, $name)) {
        //         $trueRestaurant[] = $restaurant;
        //     }
        // }
        // return response()->json($trueRestaurant);
        $query = Restaurant::where('name', 'like', $name . '%')
            ->orWhere('name', 'like', '% ' . $name . '%')->get();

        return response()->json($query);
    }

}
