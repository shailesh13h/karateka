<?php

namespace App\Model\Karateka;

use Illuminate\Database\Eloquent\Model;

class RankDetails extends Model
{
    protected $table = 'rank_mst';
    //override default primary  key

    protected $primaryKey = 'RM_ID';

   protected $fillable = [
        'RANK_ID',
        'RANK',
        'FEES',
        'M_NAME',
        'C_AMT',
        'C1_AMT',
        'C2_AMT',
        'ORDER_BY',
        'MEMBER_CODE',
        'ENTDATE',

    ];


}
