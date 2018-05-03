<?php

namespace App\Http\Resources\Karateka;

use Illuminate\Http\Resources\Json\Resource;

class RenewalResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date=date('d-m-Y',strtotime($this->EXPIRY_DATE));



        return [
            'expiryDate' => $date,

               ];
    }
}
