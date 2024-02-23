<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResources extends JsonResource
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        return RestaurantShortResource::collection($this->resource);
    }
}
