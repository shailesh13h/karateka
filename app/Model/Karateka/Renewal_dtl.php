<?php

namespace App\Model\Karateka;


use Illuminate\Database\Eloquent\Model;

class Renewal_dtl extends Model
{
    protected $table = 'renewal_dtl';
    //override default primary  key

    protected $primaryKey = 'KARATE_KA_ID';

    protected $fillable = [
        'KARATE_KA_ID',
        'RENEWAL_DATE',
        'EXPIRY_DATE',
        'ENTDATE',
        'MEMSHIP_NO',
        'FEES',
        'IS_PAID',
        'IS_RECEIVED',
                          ];


    public function karateka(){

        return $this->belongsTo(Karate_ka::class,'KARATE_KA_ID','KARATE_KA_ID');

    }





}
