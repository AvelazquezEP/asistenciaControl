<?php

namespace App\Http\Controllers;

use App\Models\resource_exam;
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
        $categories = resource_exam::where('status', true)->get()->all();

        return view('exams.index', compact('categories'));
    }

    /* #region CREATE/STORE */

    public function create(): View
    {
        return view('exams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        /* #region  STORE */
        $request->validate(([
            'type:' => 'required',
            'department' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]));

        $category = new resource_exam([
            'type' => $request->get('type_category'),
            'department' => $request->get('department'),
            'description' => $request->get('description'),
            'status' => true,
        ]);

        $category->save();

        return redirect()->route('exams.index')
            ->with('success', 'Resource created successfully');

        /* #endregion */
    }

    /* #endregion */

    /* #region EDIT/UPDATE functions*/

    public function edit($id): View
    {
        $category = resource_exam::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        /* #region UPDATE FUNCTION */
        $category = resource_exam::find($id);

        $category->type = $request->input('type_category');
        $category->department = $request->input('department');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        $category->save();

        return redirect()->route('category.index')->with('success', 'Exam category updated successfully');
        /* #endregion */
    }

    /* #endregion */

    public function destroy($id): RedirectResponse
    {
        $category = resource_exam::find($id);
        $category->delete();

        return redirect()->route('exam.index')
            ->with('success', 'Category delete');
    }
}
