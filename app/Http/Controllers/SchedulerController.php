<?php

namespace App\Http\Controllers;

use App\Models\schedulers;
use App\Http\Controllers\Controller;
use App\Models\scheduler_user;
use App\Models\User;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call

class SchedulerController extends Controller
{

    public function index(): View
    {
        $schedulers = schedulers::orderBy('title', 'desc')->get()->all();

        $data = scheduler_user::join('users', 'scheduler_user.id_user', '=', 'users.id')
            ->join('schedulers', 'scheduler_user.scheduler_id', '=', 'schedulers.id')
            ->select('scheduler_user.*', 'scheduler_user.id', 'users.*', 'scheduler_user.time_start', 'scheduler_user.time_finish')
            ->orderBy('scheduler_user.scheduler_id')
            ->get()->all();

        $users = User::get()->all();

        return view('schedulers.index', compact('schedulers', 'data', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): View
    {
        $user = User::find($id);

        return view('schedulers.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'id_user',
            'b1_time_start',
            'b1_time_finish',
            'b2_time_start',
            'b2_time_finish',
            'lnc_time_start',
            'lnc_time_finish'
        ]);

        $id_user = request('id_user');
        $b1S = request('b1_time_start');
        $b1F = request('b1_time_finish');
        $b2S = request('b2_time_start');
        $b2F = request('b2_time_finish');
        $lncS = request('lnc_time_start');
        $lncF = request('lnc_time_finish');

        /* #region SAVE TO DATABASE*/

        /* #region Save #1 */

        $b1S_stamp = "2023-06-01 " . $b1S;
        $b1F_stamp = "2023-06-01 " . $b1F;

        $scheduler_user =  new scheduler_user([
            'type' => 'b1',
            'time_start' => $b1S_stamp,
            'time_finish' => $b1F_stamp,
            'id_user' => $id_user,
            'scheduler_id' => 1
        ]);

        $scheduler_user->save();

        /* #endregion */

        /* #region Save 2 */

        $b2S_stamp = "2023-06-01 " . $b2S;
        $b2F_stamp = "2023-06-01 " . $b2F;

        $scheduler_user_2 =  new scheduler_user([
            'type' => 'b2',
            'time_start' => $b2S_stamp,
            'time_finish' => $b2F_stamp,
            'id_user' => $id_user,
            'scheduler_id' => 1
        ]);

        $scheduler_user_2->save();

        /* #endregion */

        /* #region Save 3 */

        $lncS_stamp = "2023-06-01 " . $lncS;
        $lncF_stamp = "2023-06-01 " . $lncF;

        $scheduler_user_3 =  new scheduler_user([
            'type' => 'lnc',
            'time_start' => $lncS_stamp,
            'time_finish' => $lncF_stamp,
            'id_user' => $id_user,
            'scheduler_id' => 1
        ]);

        $scheduler_user_3->save();

        /* #endregion */

        /* #endregion */

        return redirect()->route('scheduler.index')
            ->with('success', 'Scheduler created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $scheduler = schedulers::find($id);

        // return view('scheduler.show', compact('scheduler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // $schedulers = schedulers::orderBy('title', 'desc')->get()->all();

        $userId = $id;

        $data = scheduler_user::join('users', 'scheduler_user.id_user', '=', 'users.id')
            ->join('schedulers', 'scheduler_user.scheduler_id', '=', 'schedulers.id')
            ->select(
                'scheduler_user.*',
                'scheduler_user.id AS scheduler_id',
                'users.*',
                'scheduler_user.time_start',
                'scheduler_user.time_finish',
                'scheduler_user.type'
            )
            ->where('users.id', $userId)
            ->orderBy('scheduler_user.scheduler_id')
            ->get()->all();

        // $userData = $data::find($data->id, $userId);

        return view('schedulers.edit', compact('data', 'userId',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'b1_time_start',
            'b1_time_finish',
            'b2_time_start',
            'b2_time_finish',
            'lnc_time_start',
            'lnc_time_finish'
        ]);

        // $id_user = request('id_user');

        $b1S = request('b1_time_start');
        $b1F = request('b1_time_finish');
        $b2S = request('b2_time_start');
        $b2F = request('b2_time_finish');
        $lncS = request('lnc_time_start');
        $lncF = request('lnc_time_finish');

        $scheduler_id_b1 = request('scheduler_id_b1');
        $scheduler_id_b2 = request('scheduler_id_b2');
        $scheduler_id_lnc = request('scheduler_id_lnc');

        /* #region Save #1 */
        $scheduler_user_item_b1 = scheduler_user::find($scheduler_id_b1);

        $b1S_stamp = "2023/06/02 " . $b1S;
        $b1F_stamp = "2023/06/02 " . $b1F;

        // $scheduler_user_item_b1->time_start = $b1S_stamp;
        // $scheduler_user_item_b1->time_finish = $b1F_stamp;
        $scheduler_user_item_b1->time_start = $b1S_stamp;
        $scheduler_user_item_b1->time_finish = $b1F_stamp;
        $scheduler_user_item_b1->save();

        /* #endregion */

        /* #region Save 2 */

        $scheduler_user_item_b2 = scheduler_user::find($scheduler_id_b2);

        $b2S_stamp = "2023-06-01 " . $b2S;
        $b2F_stamp = "2023-06-01 " . $b2F;

        $scheduler_user_item_b2->time_start = $b2S_stamp;
        $scheduler_user_item_b2->time_finish = $b2F_stamp;
        $scheduler_user_item_b2->save();

        /* #endregion */

        /* #region Save 3 */

        $scheduler_user_item_lnc = scheduler_user::find($scheduler_id_lnc);

        $lncS_stamp = "2023-06-01 " . $lncS;
        $lncF_stamp = "2023-06-01 " . $lncF;

        $scheduler_user_item_lnc->time_start = $lncS_stamp;
        $scheduler_user_item_lnc->time_finish = $lncF_stamp;
        $scheduler_user_item_lnc->save();


        /* #endregion */
        return redirect()->route('scheduler.index')
            ->with('success', "Scheduler updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
