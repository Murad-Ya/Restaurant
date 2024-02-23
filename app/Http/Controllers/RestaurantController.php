<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestRestaurant;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Resources\Restaurant\RestaurantResources;
use App\Http\Resources\Restaurant\RestaurantShortResource;
use App\Models\Restaurant;
use http\Env\Response;
use mysql_xdevapi\Exception;

class RestaurantController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $model = Restaurant::get();
            return response()->json(
                new RestaurantResources($model));
        } catch (\Exception $exception) {
            return response()->json([
               "massage" => $exception->getMessage()
            ]);
        }
    }
    /**
     * @param StoreRequestRestaurant $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequestRestaurant $request)
    {
        try {
            Restaurant::create($request->all());
            return response()->json('Ресторан создан.');
        } catch (\Exception $exception) {
            return response()->json([
               'massage' => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show (int $id)
    {
        try {
           $model = Restaurant::find($id);
            return response()->json([
                new RestaurantResource($model)
            ]);
        } catch (\Exception $exception) {
          return response()->json([
              'massage' => $exception->getMessage()
          ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            Restaurant::destroy($id);
            return response()->json([
                'Ресторан удален'
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'massage' => $exception->getMessage()
            ]);
        }
    }
}
