<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $model = Menu::where('restaurant_id' , $request->input('restaurant_id'))
            ->get();
        return response()->json($model);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Menu::create($request->all());
        return response()->json([
           'massage' => 'Меню создано'
        ]);
    }
}
