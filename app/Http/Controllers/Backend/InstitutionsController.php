<?php

namespace App\Http\Controllers\Backend;

use App\Models\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // if (is_null($this->user) || !$this->user->can('role.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any role !');
        // }

        $institutions = Institution::all();
        return view('backend.pages.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request;

        $request->validate([
            'institution_code' => 'required|max:15',
            'institution' => 'required|max:150'
        ]);

        
        $check = Institution::where('institution_code', $request->institution_code)->first();

        if ($check) {
            //return response()->json(['message' => 'Institution already exists.'], 409);
            session()->flash('error', 'Institution already exists !!');
            return back();
        } else {
            $institution = new Institution();
            $institution->institution_code = $request->institution_code;
            $institution->institution = $request->institution;
            $institution->save();

            $institutions = Institution::all();
            return view('backend.pages.institutions.index', compact('institutions'));
        }

        

        //return redirect('/institutions')->with('success', 'New Institution has been added.');
        //session()->flash('success', 'Institution has been created !!');
        //return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
        // $institution = Institution::findById($id, 'id');
        // if (!is_null($institution)) {
        //     $institution->delete();
        // }

        // session()->flash('success', 'Institution has been deleted !!');
        // return back();

        $institution->delete();

        return redirect()->route('admin.institutions.index')
                         ->with('success','Institution deleted successfully');
    }
}
