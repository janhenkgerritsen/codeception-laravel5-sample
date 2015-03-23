<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

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
		$request->session()->set('message', $message);
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

}
