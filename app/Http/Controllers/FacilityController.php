<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use Session;

class FacilityController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        
        return view('facilities.index', ['facilities' => $facilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facilities.create');
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
            'city'      => 'required|max:64',
            'address'   => 'required|max:64'
        ));
        
        $facility = new Facility();
        
        $facility->city = $request->city;
        $facility->address = $request->address;
        
        $facility->save();
        
        Session::flash('success', 'Placówka została dodana do bazy danych.');

        return redirect()->route('facilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = Facility::find($id);

        return view('facilities.show', ['facility' => $facility]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);

        return view('facilities.edit', ['facility' => $facility]);
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
            'city'      => 'required|max:64',
            'address'   => 'required|max:64'
        ));

        $facility = Facility::find($id);
        
        $facility->city = $request->city;
        $facility->address = $request->address;
        
        $facility->save();
        
        Session::flash('success', 'Placówka została zaktualizowana.');

        return redirect()->route('facilities.show', ['facility' => $facility]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->doctors()->detach();
        
        $facility->delete();
        
        Session::flash('success', 'Placówka została usunięta.');
        
        return redirect()->route('facilities.index');
    }
}
