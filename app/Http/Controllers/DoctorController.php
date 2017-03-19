<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Session;

class DoctorController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id')->paginate(5);
        
        return view('doctors.index')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        		'academic_title' => 'max:32',
        		'first_name' => 'required|max:64',
        		'last_name' => 'required|max:64',
        ));
    	
    	$doctor = new Doctor();
        
        $doctor->academic_title = $request->academic_title;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->description = $request->description;
        
        $doctor->save();
        
        Session::flash('success', 'Lekarz został dodany do bazy danych.');

        return redirect()->route('doctors.show', $doctor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$doctor = Doctor::find($id);
    	
    	return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$doctor = Doctor::find($id);
    	 
    	return view('doctors.edit')->with('doctor', $doctor);
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
        $doctor = Doctor::find($id);
        
        $doctor->academic_title = $request->input('academic_title');
        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->description = $request->input('description');
        
        $doctor->save();
        
        Session::flash('success', 'Dane lekarza zostały zaktualizowane.');
        
        return redirect()->route('doctors.show', $doctor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        
        $doctor->delete();
        
        Session::flash('success', 'Lekarz został usunięty.');
        
        return redirect()->route('doctors.index');
    }
}
