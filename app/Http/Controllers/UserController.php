<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // $status
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
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'status' => true,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole($request->input('roles'));

        return  redirect()->route('Users.users')
            ->with('created', 'User created ');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();



        return  redirect()->route('Users.users')
            ->with('deleted', 'User deleted: ');
    }
}


class test
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
}
