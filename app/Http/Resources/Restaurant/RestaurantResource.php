<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\Menu\MenuResource;
use App\Http\Resources\Menu\MenuResources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'place_count' => $this->chars['placed'],
            'deposit' => $this->chars['deposit'],
            'schedule' => $this->schedule(),
            'menu' => new MenuResources($this->menu)
        ];
    }

    protected function schedule()
    {
        $test = Carbon::now();
        $currentDate =  Carbon::now()->timestamp;
        $result = '';
        foreach ($this->chars['schedule'] as $char) {
            $charTime = explode(':' , $char);
            $temp = Carbon::create(
                $test->year , $test->month , $test->day, (int) $charTime
            )->timestamp;
            if ($currentDate > $temp) {
                $result =  'Закрыто';
            } else {
                $result = 'Открыто';
            }
        }
            return $result;
    }
}
