<?php

namespace App\Http\Controllers;

use App\Models\resources;
use App\Http\Controllers\Controller;
use App\Models\resource_categories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;

class ResourceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:resource-list|resource-create|resource-edit|resource-delete', ['only' => ['index']]);
        $this->middleware('permission:resource-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:resource-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:resource-delete', ['only' => ['destroy']]);
    }

    public function index($id): View
    {
        $resources = resources::where('id_resource_category', $id)->get();
        // $idCategory = $id;

        return view('resources.index', compact('resources'));
        // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $categories = resource_categories::where('status', true)->get()->all();
        $categories_false = resource_categories::where('status', false)->get()->all();
        return view('resources.create', compact('categories', 'categories_false'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'resource_file' => 'required',
        ]);

        $fileResource = $request->file('resource_file')->getClientOriginalName();
        $filename = pathinfo($fileResource, PATHINFO_FILENAME);
        $extension = pathinfo($fileResource, PATHINFO_EXTENSION);
        $id_category = $request->get('id_category');

        $resource = new resources([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'resource_file' => base64_encode(file_get_contents($request->file('resource_file')->path())),
            'path_resource' => $filename,
            'extension_resource' => $extension,
            'status' => true,
            'created_at' => Carbon::now()->timespan('GMT-5'),
            'id_category' => $id_category,
        ]);

        $resource->save();

        return redirect()->route('resources.index', $id_category)
            ->with('success', 'Resource created successfully');
    }

    public function show($id): View
    {
        $resource = resources::find($id);
        $resource_base64 = $resource->resource_file;
        return view('resources.show', compact('resource'));
    }

    public function edit($id): View
    {
        // $categories = resource_categories::where('status', true)->get()->all();
        // $categories_false = resource_categories::where('status', false)->get()->all();

        $resource = resources::find($id);
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $resourceFile = '';
        $fileResource = '';
        $filename = '';
        $extension = '';

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $resource = resources::find($id);
        $id_category = $resource->id_category;

        if ($_FILES['resource_file']['size'] == 0) {
            $oldResource = $resource->resource_file;

            $resourceFile = $oldResource;
            $filename = $resource->path_resource;
            $extension = $resource->extension_resource;
        } else {
            $newResource = base64_encode(file_get_contents($request->file('resource_file')->path()));
            $fileResource = $request->file('resource_file')->getClientOriginalName();

            $resourceFile = $newResource;
            $filename = pathinfo($fileResource, PATHINFO_FILENAME);
            $extension = pathinfo($fileResource, PATHINFO_EXTENSION);
        }

        $resource->title = $request->input('title');
        $resource->description = $request->input('description');
        $resource->resource_file = $resourceFile;
        $resource->path_resource = $filename;
        $resource->extension_resource = $extension;
        $resource->status = $request->input('status');
        $resource->updated_at = Carbon::now()->timespan('GMT-5');
        $resource->id_category = $id_category;

        $resource->save();

        return redirect()->route('resources.index', $id_category)
            ->with('success', 'Resource updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $resource = resources::find($id);
        $id_category = $resource->id_category;
        $resource->delete();

        return redirect()->route('resources.index', $id_category)
            ->with('success', 'Resource delete');
    }
}
