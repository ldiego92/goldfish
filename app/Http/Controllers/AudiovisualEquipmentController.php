<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AudiovisualEquipment;
use App\Loanable.


class AudiovisualEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
		$barcode = $request->barcode;
		$note = $request->note;
		$state_id = $request->state_ide;
		
		DB::Loanable->insert(
        ['barcode' => $barcode, 'note' => $note, 'state_id' => $state_id]);
		
		
            $brand_id = $request->brand_id;
            $model_id = $request->model_id;
            $type_id = $request->type_id;
           // $loanable_id = Loanable::where('barcode', $barcode)->first()->id;
			return true;
        }
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
		
            $brand_id = $request->brand_id;
            $model_id = $request->model_id;
            $type_id = $request->type_id;
            $loanable_id = $request->loanable_id;
			
			return true;
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
