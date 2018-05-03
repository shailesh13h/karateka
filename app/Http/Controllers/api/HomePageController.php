<?php

namespace App\Http\Controllers\api;


use App\Http\Resources\Karateka\KaratekaResource;
use App\Http\Resources\Karateka\RankResource;
use App\Http\Resources\Karateka\RenewalResource;
use App\Model\Karateka\Karate_ka;
use App\Model\Karateka\RankDetails;
use App\Model\Karateka\Renewal_dtl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
class HomePageController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth:api');

        // $this->middleware('auth:api')->except('index','show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Karate_ka::find(2)->renewal_Details;


    }



    public function getDetails(Request $request)
    {
        $kid =$request->karatekaid;
         //Karate_ka::find($request->karateka_id)->renewal_Details->max('RENEWAL_DATE');
//return $request->karatekaid;
       $userDetails=Karate_ka::find($kid);
    $userDetails =new KaratekaResource($userDetails);
            $rankid= Karate_ka::select('RANK_ID')->where('KARATE_KA_ID',$kid)->get();

         $expiryDate=$this->expiryDate($kid);

        $rank = $this->rank($rankid);
    $data= array(
        'details' => $userDetails,
        'expiry' => $expiryDate,
        'rank' =>$rank,
      );
       return response($data);

    }
    public  function expiryDate($kid){
    //return $kid;
        $expiryDate= Renewal_dtl::where('KARATE_KA_ID',$kid)->orderBy('EXPIRY_DATE','desc')->first();
      // return $expiryDate;
        return new RenewalResource($expiryDate);

    }

    public  function rank($rank_id){
        $rank= RankDetails::select('RANK')->where('RANK_ID',$rank_id)->first();
        return new RankResource($rank);
       // return new RankResource($rank);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
