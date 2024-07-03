<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Exports\CourseExport;
use App\Imports\CourseImport;
use App\Http\Controllers\Controller;
use App\Imports\CourseImport as ImportsCourseImport;
use Maatwebsite\Excel\Facades\Excel;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('backend.pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Export Courses
     * 
     */
    public function courseexport()
    {
        return Excel::download(new CourseExport, 'course-export.xls');
    }

    public function courseimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataCourse', $namaFile);

        Excel::import(new CourseImport, public_path('/DataCourse/'. $namaFile));
        //return redirect('')
        
        $courses = Course::all();
        return view('backend.pages.courses.index', compact('courses'));
    }
}
