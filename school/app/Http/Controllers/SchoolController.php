<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    // Index
    public function index()
    {
        $scl=School::get();
        return view('index',compact('scl'));
    }

    // Create
    public function create()
    {
        return view('create');
    }

    // Store
    public function store(Request $request)
    {
        
        $school = $request->post('school');
        $address = $request->post('address');
        $type = $request->post('type');
        $facility = $request->post('facility');
        $allFacility = implode(',',$facility);
        $feedback = $request->post('feedback');

        $ProfileImg = time().'.'.$request->profile->extension();
        $request->profile->move(public_path('scl_profile'),$ProfileImg); 

       
        School::create(['school' => $school, 'address' => $address, 'type' => $type, 'facility' => $allFacility, 'feedback' => $feedback, 'profile' =>$ProfileImg]);

        return redirect()->route('scl.index');
    }

    //Edit
    public function edit(School $scl)
    {
        return view('edit', compact('scl'));
    }

    // Update
    public function update(Request $request, School $scl)
    {

        $school = $request->post('school');
        $address = $request->post('address');
        $type = $request->post('type');
        $facility = $request->post('facility');
        $allFacility = implode(',',$facility);
        $feedback = $request->post('feedback');

        $ProfileImg = time().'.'.$request->profile->extension();
        $request->profile->move(public_path('scl_profile'),$ProfileImg); 

        $scl->fill(['school' => $school, 'address' => $address, 'type' => $type, 'facility' => $allFacility, 'feedback' => $feedback, 'profile' =>$ProfileImg])->save();

        return redirect()->route('scl.index');
    }

    // Destroy/Delete
    public function destroy(School $scl)
    {
            $scl->delete();
            return redirect()->route('scl.index');
    }
}
