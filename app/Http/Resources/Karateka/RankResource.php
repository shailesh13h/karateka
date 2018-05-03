<?php

namespace App\Http\Resources\Karateka;

use Illuminate\Http\Resources\Json\Resource;

class RankResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'rank' => $this->RANK,

        ];
    }
}
