<?php

namespace App\Http\Controllers\Tests;

use App\Rates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries =[
          'countries' => \DB::table('countries')->where('status', '1')->get(),
        ];
        return view('testUser.index', ['countries' => $countries]);
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
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function show(Rates $rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit(Rates $rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rates $rates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rates)
    {
        //
    }
}
