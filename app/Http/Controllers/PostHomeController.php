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
        $posts = DB::table("post_homes")->get();
        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        // $imagePath = $request->file('picture')->store('public');
        // $imagePath = $request->file('picture');
        // $format = $request->file('picture')->extension();
        // $patch = $request->file('picture')->store('/storage/images');

        $imagePath = request()->file('picture');
        $imagePath->store('toPath', ['disk' => 'my_files']);


        $post = new post_home([
            'title' => $request->get('title'),
            'picture' => $imagePath,
            'description' => $request->get('description'),
        ]);

        // $postTable = DB::table("post_home");
        // $postTable::create($request->all());
        // DB::table("post_home")::create($request->all());

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
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
