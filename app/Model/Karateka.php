<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Karateka extends Model
{

    protected $table = 'karate_ka';
    //override default primary  key

    protected $primaryKey = 'KARATE_KA_ID';


    // alow filable property  it will used in while creating karateka
    // but we are commenting it cause in karatek app we are not going to edit or insert some
    //fields
    protected $fillable = [
        'LOGIN_ID',
        'TITLE',
        'NAME',
        'M_NAME',
        'L_NAME',
        'DOB',
        'CONTACT_MO',
        'ADDRESS1',
        'EMAIL',
        'TITLE',
        'GRNUMBER',
        'MEMBER_CODE',

    ];






}
