<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialization;
use Session;
use Image;
use Purifier;
use Storage;

class DoctorController extends Controller
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
        $doctors = Doctor::orderBy('id')->paginate(5);
        
        return view('doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('doctors.create', ['specializations' => $specializations]);
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
        		'academic_title'    => 'max:32',
        		'first_name'        => 'required|max:64',
        		'last_name'         => 'required|max:64',
                'image'             => 'sometimes|image',
                'specialization_id' => 'nullable|integer'
        ));
    	
    	$doctor = new Doctor();
        
        $doctor->academic_title = $request->academic_title;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->specialization_id = $request->specialization_id;
        $doctor->description = Purifier::clean($request->description);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(300, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($location);

            $doctor->image = $filename;
        }

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
        $specializations = Specialization::all();
        $specializations_choice = array(null => '');
        foreach ($specializations as $specialization) {
            $specializations_choice[$specialization->id] = $specialization->name;
        }
    	 
    	return view('doctors.edit', ['doctor' => $doctor, 'specializations' => $specializations_choice]);
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
                'academic_title'    => 'max:32',
                'first_name'        => 'required|max:64',
                'last_name'         => 'required|max:64',
                'image'             => 'sometimes|image',
                'specialization_id' => 'nullable|integer'
        ));

        $doctor = Doctor::find($id);
        
        $doctor->academic_title = $request->academic_title;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->specialization_id = $request->specialization_id;
        $doctor->description = Purifier::clean($request->description);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(300, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($location);

            $old_filename = $doctor->image;
            $doctor->image = $filename;
            Storage::delete($old_filename);
        }
        
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

        Storage::delete($doctor->image);
        
        $doctor->delete();
        
        Session::flash('success', 'Lekarz został usunięty.');
        
        return redirect()->route('doctors.index');
    }
}
