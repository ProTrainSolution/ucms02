<?php

namespace App\Http\Controllers\Backend;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = Program::all();
        return view('backend.pages.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $institutions = Institution::all();
        return view('backend.pages.programs.create', compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // {"_token":"ocg0k2tBkz2z8FyotLVUNnLTIwhTVE1XZYTJ4cBI","institution_id":"1","institution_code":"DIT","institution":"DIPLOMA IN INFORMATION TECHNOLOGY"}
        // return $request;

        $request->validate([
            'institution_id' => 'required',
            'program_code' => 'required|max:15',
            'program' => 'required|max:150'
        ]);

        
        $check = Program::where('program_code', $request->program_code)->first();

        if ($check) {
            //return response()->json(['message' => 'Institution already exists.'], 409);
            session()->flash('error', 'Program already exists !!');
            return back();
        } else {
            $program = new Program();
            $program->institution_id = $request->institution_id;
            $program->program_code = $request->program_code;
            $program->program = $request->program;
            $program->save();

            $programs = Program::all();
            return view('backend.pages.programs.index', compact('programs'));
        }
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
    public function destroy(string $id)
    {
        //
    }
}
