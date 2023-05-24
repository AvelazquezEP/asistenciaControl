<?php

namespace App\Http\Controllers;

// use App\Models\post_home;
use App\Models\posts;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

    public function index(Request $request): View
    {
        $posts = posts::latest()->paginate(10);

        return view('posts.index', compact('posts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
            'description' => 'required',
        ]);

        $image = base64_encode(file_get_contents($request->file('picture')->path()));

        $post = new posts([
            'title' => $request->get('title'),
            'picture' => $image,
            'description' => $request->get('description'),
            'status' => true,
            'created_at' => Carbon::now()->timespan('GMT-5'),
        ]);

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    public function edit($id): View
    {
        // $post = DB::table('post_homes')->where('id', $id)->first();
        $post = posts::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $image = '';
        $request->validate([
            'title' => 'required',
            // 'picture' => 'required',
            'description' => 'required',
        ]);

        // $post = DB::table('posts')->where('id', $id)->first();
        $post = posts::find($id);

        if ($_FILES['picture']['size'] == 0) {
            $oldImage = $post->picture;
            $image = $oldImage;
        } else {
            $newImage = base64_encode(file_get_contents($request->file('picture')->path()));
            $image = $newImage;
        }

        $post->title = $request->input('title');
        $post->picture = $image;
        $post->description = $request->input('description');
        $post->status = $request->input('status');
        $post->updated_at = Carbon::now()->timespan('GMT-5');

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        // $post = DB::table('post_homes')->where('id', $id)->first();

        posts::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted');
    }
}
