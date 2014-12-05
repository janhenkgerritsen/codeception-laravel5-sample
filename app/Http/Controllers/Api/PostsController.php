<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class PostsController extends Controller {

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * Constructor.
     *
     * @param Post $post
     * @param ResponseFactory $responseFactory
     */
    public function __construct(Post $post, ResponseFactory $responseFactory)
    {
        $this->post = $post;
        $this->responseFactory = $responseFactory;
    }

    /**
     * Display a listing of posts.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $posts = $this->post->all();

        return $this->responseFactory->json($posts);
    }

    /**
     * Store a newly created post.
     *
     * @param PostStoreRequest $request
     * @return JsonResponse
     */
    public function store(PostStoreRequest $request)
    {
        $post = $this->post->create($request->all());

        return $this->responseFactory->json($post);
    }


    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return $this->responseFactory->json($post);
    }


    /**
     * Update the specified post.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $post = $this->post->findOrFail($id);
        $post->update($request->all());

        return $this->responseFactory->json($post);
    }


    /**
     * Delete the specified post.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
    }

}
