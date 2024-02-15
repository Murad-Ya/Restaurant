<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestRestaurant;
use App\Http\Resources\Restaurant\RestaurantResources;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $model = Restaurant::get();
        return response()->json(
            new RestaurantResources($model)
        );
    }

    /**
     * @param StoreRequestRestaurant $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequestRestaurant $request)
    {
        Restaurant::create($request->all());
        return response()->json('Ресторан создан.');
    }
}
