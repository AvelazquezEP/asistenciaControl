<?php

namespace App\Http\Controllers;

use App\Models\schedulers;
use App\Http\Controllers\Controller;
use App\Models\scheduler_user;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call

class SchedulerController extends Controller
{

    public function index(): View
    {
        $schedulers = schedulers::orderBy('title', 'desc')->get()->all();

        // $users = User::where('id', 1)->get()->all();
        $users = User::get()->all();

        $data = scheduler_user::join('users', 'scheduler_user.id_user', '=', 'users.id')
            ->join('schedulers', 'scheduler_user.scheduler_id', '=', 'schedulers.id')
            ->select('scheduler_user.*', 'scheduler_user.id', 'users.*', 'schedulers.time_start', 'schedulers.time_finish')
            ->orderBy('scheduler_user.scheduler_id')
            ->get()->all();

        return view('schedulers.index', compact('schedulers', 'data', 'users'));
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
