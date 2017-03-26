<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialization;
use Session;

class SpecializationController extends Controller
{
    public function __construct()
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
        $specializations = Specialization::all();

        return view('specializations.index', ['specializations' => $specializations]);
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
                'name' => 'required|max:64'
        ));
        
        $specialization = new Specialization();
        
        $specialization->name = $request->name;
        
        $specialization->save();
        
        Session::flash('success', 'Specjalizacja została dodana do bazy danych.');

        return redirect()->route('specializations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialization = Specialization::find($id);

        return view('specializations.show', ['specialization' => $specialization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialization = Specialization::find($id);

        return view('specializations.edit', ['specialization' => $specialization]);
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
         $this->validate($request, array(
                'name' => 'required|max:64'
        ));
        
        $specialization = Specialization::find($id);
        
        $specialization->name = $request->name;
        
        $specialization->save();
        
        Session::flash('success', 'Specjalizacja została zaktualizowana.');

        return redirect()->route('specializations.show', ['specialization' => $specialization]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        $doctors = $specialization->doctors;
        foreach ($doctors as $doctor) {
            $doctor->specialization()->dissociate();
            $doctor->save();
        }
        
        $specialization->delete();
        
        Session::flash('success', 'Specjalizacja została usunięta.');
        
        return redirect()->route('specializations.index');
    }
}
