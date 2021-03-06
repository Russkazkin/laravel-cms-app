<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->withCategories(Category::all())->withTags(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePostsRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePostsRequest $request)
    {
        /**
         * @var $post Post
         */
        $image = $request->image->store('posts');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->text,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        session()->flash('success', 'Post created successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->withTags(Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'text', 'published_at', 'category_id']);

        if($request->hasFile('image')) {

            $image = $request->image->store('posts');

            $post->deleteImage();

        } else {
            $image = $post->image;
        }

        if($request->tags) {
            $post->tags()->sync($request->tags);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->text,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        session()->flash('success', 'Post updated successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /**
         * @var $post Post
         */
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()) {

            $post->deleteImage();

            $post->forceDelete();

            session()->flash('success', 'Post deleted successfully');

        } else {

            $post->delete();

            session()->flash('success', 'Post trashed successfully');
        }
        return redirect(route('posts.trashed'));
    }

    /**
     * Display a listing of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully');

        return redirect()->back();
    }
}
