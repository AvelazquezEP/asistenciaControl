<?php

namespace App\Http\Controllers;

use App\Models\resources;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call
use Illuminate\Http\UploadedFile;

class ResourceController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:resource-list|resource-create|resource-edit|resource-delete', ['only' => ['index']]);
    //     $this->middleware('permission:resource-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:resource-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:resource-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        return view('documents.index');
        // $resources = resources::latest()->paginate(25);
        // return view('documents.index', compact($resources))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(resources $resources)
    {
        //
    }

    public function edit(resources $resources)
    {
        //
    }


    public function update(Request $request, resources $resources)
    {
        //
    }


    public function destroy(resources $resources)
    {
        //
    }
}
