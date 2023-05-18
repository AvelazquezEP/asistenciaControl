<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return View("Users.users")->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('Users.edit', ['user' => $user]);
    }

    public function updated(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');

        User::query('update topics set title = ?,content=?,img_url=? where id = ?', [$name, $email, $password, $id, $status]);

        $data = array(
            'name' => $name,
            "email" => $email,
            "password" => $password,
            "status" => $status,
        );

        $User = User::findOrFail($id);
        $User->update($data);

        return redirect()->route('Users.users')
            ->with('updated', 'User edited');
        // ->with('updated', 'User edited , ' . $request->input('email'));
    }

    public function create()
    {
        return view('Users.create');
    }

    public function insert(Request $request)
    {
        $date = date('Y-m-d H:i:s');

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $createdAt = $request->$date;
        $data = array(
            'name' => $name,
            "email" => $email,
            "password" => $password,
            "create_at" => $createdAt,
        );

        // User::table('topics')->insert($data);
        User::create($data);

        return  redirect()->route('Users.users')
            ->with('created', 'User created ' . $request->input('email'));
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();



        return  redirect()->route('Users.users')
            ->with('deleted', 'User deleted: ');
    }
}
