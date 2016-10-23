<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Loan;
Use App\Loanable;
Use App\AudiovisualEquipment;
Use DB;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

	public function getStatistics(Request $request) {
		$type = $request->type;
		$complete_date = $request->date; 
	
		$date = explode("-" , $complete_date);
		$year = $date[0];
		$month = $date[1];
		$day = $date[2];
		
		$loans_by_year = DB::table('loans')
	              ->join('loanables','loans.loanable_id','=','loanables.id')
				  ->join('audiovisual_equipments','loanables.id','=','audiovisual_equipments.loanable_id')
				  ->where('audiovisual_equipments.type_id','=',$type)
				  ->whereYear('departure_time','=', $year)
		          ->get();
				  
		$loans_by_month = DB::table('loans')
	              ->join('loanables','loans.loanable_id','=','loanables.id')
				  ->join('audiovisual_equipments','loanables.id','=','audiovisual_equipments.loanable_id')
				  ->where('audiovisual_equipments.type_id','=',$type)
				  ->whereYear('departure_time','=', $year)
				  ->whereMonth('departure_time','=', $month)
		          ->get();
 	  
		$loans_by_day = DB::table('loans')
	              ->join('loanables','loans.loanable_id','=','loanables.id')
				  ->join('audiovisual_equipments','loanables.id','=','audiovisual_equipments.loanable_id')
				  ->where('audiovisual_equipments.type_id','=',$type)
				  ->whereYear('departure_time','=', $year)
				  ->whereMonth('departure_time','=', $month)
				  ->whereDay('departure_time','=', $day)
		          ->get();
				  
		return 'Prestamo por año: ' . count($loans_by_year) . ', por mes: ' . count($loans_by_month) . ', por dia: ' . count($loans_by_day);	
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
