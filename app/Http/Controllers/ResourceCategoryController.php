<?php

namespace App\Http\Controllers;

use App\Models\resource_categories;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ResourceCategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $categories = resource_categories::where('status', true)->get()->all();

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'Description' => 'required',
        ]);

        $category = new resource_categories([
            'title' => $request->get('title'),
            'Description' => $request->get('Description'),
            'icon' => base64_encode(file_get_contents($request->file('icon')->path())),
            'status' => true,
            'created_at' => Carbon::now()->timespan('GMT-5'),
        ]);

        $category->save();

        return redirect()->route('category.index')
            ->with('success', 'Resource created successfully');
    }

    public function edit($id): View
    {
        $category = resource_categories::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $fileResource = '';

        $request->validate([
            'title' => 'required',
            'Description' => 'required',
        ]);

        $category = resource_categories::find($id);
        // $id_category = $category->id;

        if ($_FILES['icon']['size'] == 0) {
            $oldIcon = $category->icon;
            $fileResource = $oldIcon;
        } else {
            $newIcon = base64_encode(file_get_contents($request->file('icon')->path()));
            $fileResource = $newIcon;
        }

        $category->title = $request->input('title');
        $category->Description = $request->input('Description');
        $category->icon = $fileResource;
        $category->status = $request->input('status');

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $category = resource_categories::find($id);
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category delete');
    }
}
