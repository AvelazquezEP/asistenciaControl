<?php

namespace App\Http\Controllers;

use App\Models\schedulers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{

    public function index(): View
    {
        $schedulers = schedulers::get()->all();

        return view('schedulers.index', compact('schedulers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): View
    {
        $user = User::find($id);

        return view('schedulers.create', compact('$user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            
            'start_time',
            'finish_time',
        ]);

        return redirect('scheduler.index')
            ->with('success', 'created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $scheduler = schedulers::find($id);

        return view('scheduler.show', compact('scheduler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
