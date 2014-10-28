<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Controller methods are called when a request enters the application
	| with their assigned URI. The URI a method responds to may be set
	| via simple annotations. Here is an example to get you started!
	|
	*/

	/**
	 * @Get("/")
	 */
	public function index()
	{
		return view('hello');
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
