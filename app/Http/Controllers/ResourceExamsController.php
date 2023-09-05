<?php

namespace App\Http\Controllers;

// use App\Models\exam;
use App\Models\resources_exams;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class ResourceExamsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:exams-list|exams-create|exams-edit|exams-delete', ['only', ['index']]);
        $this->middleware('permission:exams-create', ['only' => ['store']]);
        $this->middleware('permission:exams-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exams-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $categories = resources_exams::where('status', true)->get()->all();

        return view('resource_exams.index', compact('categories'));
    }

    /* #region CREATE/STORE */

    public function create(): View
    {
        return view('resource_exams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        /* #region  STORE */

        $request->validate(([
            'type' => 'required',
            'department' => 'required',
            'description' => 'required',
            'status' => 'required',
            // 'created_at' => 'required',
        ]));

        $category = new resources_exams([
            'type' => $request->get('type'),
            'department' => $request->get('department'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
            // 'created_at' => '2023-08-31 18:03:49.000',
        ]);

        $category->save();

        return redirect()->route('resource_exams.index')
            ->with('success', 'Resource created successfully');

        /* #endregion */
    }

    /* #endregion */

    /* #region EDIT/UPDATE functions*/

    public function edit($id): View
    {
        $category = resources_exams::find($id);
        return view('resource_exams.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        /* #region UPDATE FUNCTION */
        $category = resources_exams::find($id);

        $category->type = $request->input('type');
        $category->department = $request->input('department');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        $category->save();

        return redirect()->route('resource_exams.index')->with('success', 'Exam category updated successfully');
        /* #endregion */
    }

    /* #endregion */

    public function destroy($id): RedirectResponse
    {
        $category = resources_exams::find($id);
        $category->delete();

        return redirect()->route('resource_exams.index')
            ->with('success', 'Category delete');
    }
}
