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

    public function userById($id)
    {
        $user = User::where('id', $id)->first();
        return view('Users.user', ['user' => $user]);
    }

    
    public function updated(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        User::query('update topics set title = ?,content=?,img_url=? where id = ?', [$name, $email, $password, $id]);

        $data = array('name' => $name, "email" => $email, "password" => $password);
        // User::Table('users')->update($data);
        // User::whereIn('id', $id)->update($request->all());

        $User = User::findOrFail($id);
        $User->update($data);

        return redirect()->route('Users.users')
            ->with('updated', 'User edited , ' . $request->input('email'));
    }

    public function insert(Request $request)
    {

        // $img = $request->input('img');
        // $title = $request->input('title');
        // $content = $request->input('content');
        // $data = array('title' => $title, "content" => $content, "img_url" => $img);
        // \DB::table('topics')->insert($data);

        // return  redirect()->route('index.topics')
        //     ->with('created', 'Post created ,new Title: ' . $request->input('title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
