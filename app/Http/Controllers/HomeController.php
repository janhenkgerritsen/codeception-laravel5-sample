<?php namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Events\OtherTestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'secure']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('hello');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function flash()
    {
        Session::flash('message', "It's a flash");

        return view('flash');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function back()
    {
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return redirect()->route('homepage');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function secure()
    {
        return view('hello');
    }

    /**
     * @param Request $request
     * @param $message
     * @return void
     */
    public function session(Request $request, $message)
    {
        $request->session()->put('message', $message);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function form(Request $request)
    {
        $message = $request->get('message', '');

        return view('form', compact('message'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function specialCharacters()
    {
        return view('special-characters');
    }

    /**
     * @return string
     */
    public function fireEvent()
    {
        event(new TestEvent());
        event(new OtherTestEvent());

        return '';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function validation(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required|exists:posts,id',
            'postal_code' => 'required|postal_code'
        ]);

        return 'Validation success';
    }

    /**
     * @return string
     */
    public function domain()
    {
        return 'Domain route';
    }

    /**
     * @return string
     */
    public function subdomain()
    {
        return 'Subdomain route';
    }

    /**
     * @return string
     */
    public function wildcard()
    {
        return 'Wildcard route';
    }

    /**
     * @return string
     */
    public function multipleWildcards()
    {
        return 'Multiple wildcards route';
    }

    /**
     * @return \Illuminate\View\View
     */
    public function serviceContainer()
    {
        return view('service-container');
    }

    /**
     * @return string
     */
    public function testValue()
    {
        return 'Test value is ' . config('test_value');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        $uploadedFile = $request->file('file');

        return $uploadedFile->isValid() ? 'Success' : 'Failure';
    }
}
