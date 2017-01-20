<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Term;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getJsonContract($contract_id)
    {
        $terms = Term::where('contract_id', $contract_id)->get();
        echo $terms;
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
        $term = new Term;
        //echo $request->all();exit;
        $term->contract_id = $request->input('contract_id');
        $term->provider_id = $request->input('provider_id');
        $term->service_id  = $request->input('service_id');
        $term->start_date  = date("Y-m-d H:i:s",strtotime($request->input('start_date')));
        $term->end_date  = date("Y-m-d H:i:s",strtotime($request->input('end_date')));
        $term->amount = $request->input('amount');
        $term->frequency = $request->input('frequency');
        $term->producer1_id = $request->input('producer1_id');
        $term->producer1_split = $request->input('producer1_split');
        if($request->has('producer2_id')){
          $term->producer2_id = $request->input('producer2_id');
        }else{
          $term->producer2_id = 0;
        }
        $term->producer2_split = $request->input('producer2_split');
        $term->save();
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
