<?php

namespace App\Http\Controllers;

use App\Models\post_home;
// use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostHomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $posts = DB::table("post_home")->orderBy('title')->paginate(5);
        // $posts = post_home::latest()->paginate(5);
        $posts = DB::table("post_home")->get();
        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post_home $postHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post_home $postHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post_home $postHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post_home $postHome)
    {
        //
    }
}
