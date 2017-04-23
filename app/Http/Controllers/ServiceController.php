<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Specialization;

class ServiceController extends Controller
{
    public function specializationsIndex()
    {
    	$specializations = Specialization::orderBy('name')->get();

    	return view('services.specializations.index', ['specializations' => $specializations]);
    }

    public function specializationsShow($id)
    {
    	$specialization = Specialization::find($id);

        return view('services.specializations.show', ['specialization' => $specialization]);
    }

    public function doctorsShow($id)
    {
		$doctor = Doctor::find($id);

        return view('services.doctors.show', ['doctor' => $doctor]);
    }
}
