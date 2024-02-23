<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\Menu\MenuResources;
use App\Http\Services\Restaraunt\SheduleRestarauntService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantShortResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        $shed = new SheduleRestarauntService($this->chars['schedule']);
        return [
            'id' => $this->id,
            'name' => $this->name . ":" . $this->description,
            'place_count' => $this->chars['placed'],
            'deposit' => $this->chars['deposit'],
            'schedule' => $shed->make()
        ];
    }
}
