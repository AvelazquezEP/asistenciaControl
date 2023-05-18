<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::get();
            $max_users = count($users);

            return View("welcome")->with('MAX', $max_users);
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the main site.',
            ])->onlyInput('email');
    }
}
