<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AjaxCrud;        //ADD MODEL
use DataTables;                 //ADD DATA TABLE

class AjaxController extends Controller
{   
    // INDEX VIEW
    public function index(Request $request)
    {
        $data = AjaxCrud::get();    //GET FILLABLE DATA FROM MODEL FOR VIEW
        if($request->ajax())
        {
            $allData = DataTables::of($data)    //ALL DATA VIEW

            ->addIndexColumn()      //ADD ANOTHER COLUMN
            ->addColumn('action',function($row)
            {
                // javascript:void(0) : return undefined as a primitive value

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editData">Edit</a>';
                
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';

                return $btn;

            })
            ->rawColumns(['action']) //render an html content
            ->make(true);

            return $allData;
        }
            return view('index',compact('data'));
    }
    
    // STORE
    public function store(Request $request)
    {
        // update
        // if fetch id then....
        if($request->id)
        {
           $updt = AjaxCrud::find($request->id);
           $name = $request->post('name');
           $email = $request->post('email');

           $updt->update
           ([
                'name' => $name,
                'email' => $email
           ]);

           return redirect()->route('data.index');
        }
        // if cant fetch id then create
        else
        {
            $name = $request->post('name');
            $email = $request->post('email');
            AjaxCrud::Create(['name' => $name, 'email' => $email]);
            return redirect()->route('data.index');
        }
    }

    // EDIT
    public function edit($id)
    {
        // get id of record and desplay old record
        $upd = AjaxCrud::find($id);
        return response()->json($upd);
    }

    // DELETE
    public function destroy($id)
    {
        AjaxCrud::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
    
}
