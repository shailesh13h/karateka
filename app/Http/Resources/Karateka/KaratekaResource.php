<?php

namespace App\Http\Resources\Karateka;

use Illuminate\Http\Resources\Json\Resource;

class KaratekaResource extends Resource
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

            'title'=> $this->TITLE,
            'firstName' =>$this->NAME,
            'middleName' =>$this->M_NAME,
            'lastName' =>$this->L_NAME,
            'birthdate' =>$this->DOB,
            'contactNo' =>$this->CONTACT_MO,
            'address' =>$this->ADDRESS1,
            'email'=>$this->EMAIL,
            'grNumber' => $this->GRNUMBER,
            'membershipNo' => $this->MEMBER_CODE,



        ];
    }
}
