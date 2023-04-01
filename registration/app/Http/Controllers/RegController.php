<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RegData;
use DataTables;

class RegController extends Controller
{
// INDEX VIEW
    public function index(Request $request)
    {
        $rgstr = RegData::get();
        if ($request->ajax()) {
            $allData = DataTables::of($rgstr) //ALL DATA VIEW
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action']) //render an html content
                ->make(true);
            return $allData;
        }
        return view('index', compact('rgstr'));
    }
// STORE AND UPDATE
    public function store(Request $request)
    {
        if ($request->id) 
        {
            $updt = RegData::find($request->id);
            $name = $request->post('name');
            $email = $request->post('email');
            $mobile = $request->post('mobile');
            $gender = $request->post('gender');
            $education = $request->post('education');
            $hobbie = $request->post('hobbie');

            $updt->update
                ([
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'gender' => $gender,
                    'education' => $education,
                    'hobbie' => $hobbie
                ]);

                return redirect()->route('rgstr.index');
        }
        else
        {
            // echo "<pre>";
            // print_r($request->post());
            // exit;
            $name = $request->post('name');
            $email = $request->post('email');
            $mobile = $request->post('mobile');
            $gender = $request->post('gender');
            $education = $request->post('education');
            $hobbie = $request->post('hobbie');

            RegData::create(['name' => $name, 'email' => $email, 'mobile' => $mobile, 'gender' => $gender, 'education' => $education, 'hobbie' => $hobbie,]);

            return redirect()->route('rgstr.index');
        }
    }

// DELETE
    public function destroy($id)
    {
        RegData::find($id)->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
// EDIT

    public function edit($id)
    {
        $edt = RegData::find($id);
        return response()->json($edt);
    }
    
}
