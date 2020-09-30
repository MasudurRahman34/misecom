<?php

namespace App\Http\Controllers\Backend\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use App\Models\Sections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use DB;

class SectionsController extends Controller
{
    //
    public function index()
    {
        return view('backend.pages.section.create');
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show(Sections $sections)
    {
        
    }


    public function edit(Sections $sections)
    {
        //
    }

   
    public function update(Request $request, Sections $sections)
    {
        //
    }

   
    public function destroy(Sections $sections)
    {
        //
    }
}
