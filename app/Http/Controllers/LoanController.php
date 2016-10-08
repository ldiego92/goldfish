<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;

use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Loanable;
use App\Loan;
use App\Penalty;
use App\Role;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barcode = $request->barcode;
        $identification = $request->identification;
        $departure_time = $request->departure_time;
        $return_time = $request->return_time;

        $loanable = Loanable::where('barcode', $barcode)->first();
        if($loanable != null){
            $loanable->state;
            return $this->getConcreteLoanalbe($loanable);
        }
        return $loanable;
    }

    private function getConcreteLoanalbe($loanable)
    {
        $concreteTypes = [
            'audiovisualEquipment',
            'copyPeriodicPublication',
            'audiovisualMaterial',
            'cartographicMaterial',
            'threeDimensionalObject',
        ];

        foreach ($concreteTypes as $type) {
            if($loanable->$type != null){
                return $loanable->$type; 
            }
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->authorize('borrower');

        $barcode = $request->barcode;
        $identification = $request->identification;
        $departure_time = $request->departure_time;
        $return_time = $request->return_time;

        $loanale = Loanable::where('barcode', $barcode)->get();
        return $loanale;
        
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
