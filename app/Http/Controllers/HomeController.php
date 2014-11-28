<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}


	/**
	 * @Get("/flash")
	 */
	public function flash()
	{
		Session::flash('message', "It's a flash");

		return view('flash');
	}

	/**
	 * @Get("/back")
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function back()
	{
		return redirect()->back();
	}

	/**
	 * @Get("/secure")
	 * @Middleware("auth")
	 *
	 * @return \Illuminate\View\View
	 */
	public function secure()
	{
		return view('hello');
	}

	/**
	 * @Get("/session/{message}")
	 *
	 * @param Request $request
	 * @param $message
	 * @return void
	 */
	public function session(Request $request, $message)
	{
		$request->session()->set('message', $message);
	}

	/**
	 * @Get("/form")
	 *
	 * @return \Illuminate\View\View
     */
	public function form()
	{
		return view('form');
	}

	/**
	 * @Post("/form/result")
	 *
	 * @param Request $request
	 * @return \Illuminate\View\View
     */
	public function formResult(Request $request)
	{
		$message = $request->get('message');

		return view('form-result', compact('message'));
	}
}
