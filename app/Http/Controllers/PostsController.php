<?php namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;

class PostsController extends Controller {

    /**
     * @var Post
     */
    private $post;


    /**
     * Constructor.
     *
     * @param Post $post
     */
    public function  __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->post->all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly create Post.
     *
     * @param PostStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $this->post->create($request->input());

        return redirect()->route('posts.index');
    }

    /**
     * Display a post.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing a post.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->post->findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update a post.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostUpdateRequest $request, $id)
    {
        /** @var Post $post */
        $post = $this->post->findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();

        return redirect()->route('posts.index');
    }
}
