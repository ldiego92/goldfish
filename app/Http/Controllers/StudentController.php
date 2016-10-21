<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
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
        $user = new User();
		$user->identity_card = $request->identity_card;
		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->birthdate = $request->birthdate;
		$user->home_phone = $request->home_phone;
		$user->cell_phone = $request->cell_phone;
		$user->password = bcrypt($request->password);
		$user->next_update_time = $request->next_update_time;
		$user->active = $request->active;
		$user->role_id = $request->role_id;
		$user->save();
		
	    $id_user = User::where('identity_card', $request->identity_card)->first()->id;

		$student = new Student();
		$student->user_id = $id_user;
		$student->license = $request->license;
		$student->save();
		
		if(isset($student)) {
		    return $student;	
		} else {
			return null;
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
        return Student::find($id);
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
        $user = User::find($id);
		$user->identity_card = $request->identity_card;
		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->birthdate = $request->birthdate;
		$user->home_phone = $request->home_phone;
		$user->cell_phone = $request->cell_phone;
		$user->password = bcrypt($request->password);
		$user->next_update_time = $request->next_update_time;
		$user->active = $request->active;
		$user->role_id = $request->role_id;
		$user->save();
		
		$student = Student::where('user_id',$user->id)->first();
		$student->license = $request->license;
		$student->save();
		
	    if(isset($student)) {
		    return $student;	
		} else {
			return null;
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Student::destroy($id);
		if($del==true) {
		return 1;
		}
		return 0; 
    }
}
