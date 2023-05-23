<?php

namespace App\Http\Controllers;

use App\Models\post_home;
// use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //<--- this line fix the DB call
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;

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
            'picture' => 'required',
            // 'picture' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        // $my_bytea = stream_get_contents($request->get('picture'));
        // $my_string = pg_unescape_bytea($my_bytea);
        $image = base64_encode(file_get_contents($request->file('picture')->path()));

        // $html_data = htmlspecialchars($my_string);

        $imagePath = $image;

        $post = new post_home([
            'title' => $request->get('title'),
            'picture' => $image,
            'description' => $request->get('description'),
        ]);

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $post = DB::table('post_homes')->where('id', $id)->first();
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
            // 'picture' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        $post = DB::table('post_homes')->where('id', $id)->first();
        $post->title = $request->input('title');
        $post->picture = base64_encode(file_get_contents($request->file('picture')->path()));
        $post->description = $request->input('description');

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post_home $postHome)
    {
        //
    }
}
