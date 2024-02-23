<?php

namespace App\Http\Services\Restaraunt;

use Carbon\Carbon;

class SheduleRestarauntService
{
    protected $shed;
    protected $current;
    public function __construct($shed)
    {
        $this->shed = $shed;
        $this->current = Carbon::now();
    }

    public function make()
    {
        $startAt = $this->shed[0];
        $endAt = $this->shed[1];
        if ($this->current->timestamp > $this->timeAt($startAt)
        & $this->current->timestamp < $this->timeAt($endAt)) {
            return 'Открыто';
        } else {
            return 'Закрыто';
        }
    }

    protected function timeAt(string $time)
    {
        $stamp = explode(':' , $time);
        return Carbon::create(
            $this->current->year,
            $this->current->month,
            $this->current->day,
            (int) $stamp[0]
        )->timestamp;
    }
}
