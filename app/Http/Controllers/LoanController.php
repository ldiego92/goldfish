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
use Auth;

class LoanController extends Controller
{
    private $available;
    private $borrowed;
    private $out_of_service;
    private $in_repair;

    public function __construct(){
        $this->middleware('cros', ['except' => ['create', 'edit']]);
        $this->available = 1;
        $this->borrowed = 2;
        $this->out_of_service = 3;
        $this->in_repair = 4;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Loan::all();
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
        $loan =new Loan();
		$barcode = $request->barcode;
        $loanable = Loanable::where('barcode', $barcode)->first();
		
        $loan->departure_time = date('Y-m-d H:i:s');
        $loan->user_id = $request->user_id;
        $loan->return_time = $request->return_time;
        $loan->authorizing_user_id = 1;//Auth::user()->id;
        $loan->loanable_id = $loanable->id; 
		
		if($loanable->state_id == $this->available && isset($request->user_id) &&  $request->user_id != null && isset($loanable)){
			$loanable->state_id = $this->borrowed;
			$loanable->save();
			$loan->save();
            $loan->loanable;
        
            $loan->audiovisualEquipment;
            $loan->copyPeriodicPublication;
            $loan->audiovisualMaterial;
            $loan->cartographicMaterial;
            $loan->threeDimensionalObject;
        
			return $loan;
		}    
        return null;
    }

    public function gets()
    {
        return  response()->json(['a' => Auth::user()])->setCallback($request->input('callback'));//Auth::user());
    }
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::find($id);
        if(isset($loan)){
            $loan->audiovisualEquipment;
            $loan->copyPeriodicPublication;
            $loan->audiovisualMaterial;
            $loan->cartographicMaterial;
            $loan->threeDimensionalObject;
        }
        return $loan;
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

    public function returnLoan(Request $request)
    {
        $barcode = $request->barcode;
        
        $loanable = Loanable::where('barcode', $barcode)->first();

        $loan = Loan::where('loanable_id', $loanable->id)->orderBy('id', 'desc')->first();
        
        if($loanable->state_id == $this->borrowed && $loan->user_return_time == "0000-00-00 00:00:00"){
            $loanable->state_id = $this->available;
            $loan->user_return_time = date('Y-m-d H:i:s');
            $loanable->save();
            $loan->save();
        } 
        $loan->loanable;
        return $loan;
    }

    public function returnLoanById(Request $request){

        $user = User::find($request->id);

        if(isset($user)){
            $loanById = Loan::where('user_id' ,'=', $user->id)->where('user_return_time' ,'=', '0000-00-00 00:00:00')->get();
            foreach ($loanById as $loan) {
                $loan->loanable;
                if(isset($loan)){
                    $loan->audiovisualEquipment;
                    $loan->copyPeriodicPublication;
                    $loan->audiovisualMaterial;
                    $loan->cartographicMaterial;
                    $loan->threeDimensionalObject;
                }
            }
        }
        return $loanById;
    }


    public function automaticLoan(Request $request){

        $barcode = $request->barcode;
        $loanable = Loanable::where('barcode', $barcode)->first();

        if(!isset($loanable) || $loanable == null){
            return array('response' => "empty");
        }

        if($loanable->state_id == $this->available){
            //return 'entro arriba '.$loanable->state_id;
            return $this->store($request);
        }elseif($loanable->state_id == $this->borrowed){
                        //return 'entro abajo '.$this->available;

            return $this->returnLoan($request);
        }
        return array('response' => "not available");
    } 
}
