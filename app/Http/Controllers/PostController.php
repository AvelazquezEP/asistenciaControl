<?php
// ESTE CONTROLADOR ES DE PRUEBAS
// NO USAR ESTE CONTROLADOR
namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
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
    public function index(Request $request): View
    {
        // $posts = Post::get();

        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
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
            'description' => 'required',
        ]);

        $image_base64 = base64_decode(file_get_contents($request->file('picture')->path()));
        $currentTime = Carbon::now()->timestamp('America/Tijuana');


        ([
            'title' => $request->get('title'),
            'picture' => $image_base64,
            'description' => $request->get('description'),
            'created_at' => $currentTime,
        ]);
        $post = new Post;
        $post->title = $request->get('title');
        $post->picture = $image_base64;
        $post->description = $request->get('description');
        $post->created_at = $currentTime;

        $post->save();
        // Post::create($postData->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
