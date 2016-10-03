<?php
namespace Framework\Controllers;

use Framework\Framework\Core\Controller;
use Framework\Framework\Core\Request;
use Framework\Framework\Core\View;
use Framework\Framework\Core\Log;
use Framework\Framework\Core\DB;

/**
 * Pages controller
 *
 * @author Magnus <test@test.com>
 */

class Pages extends Controller
{
	public static function home()
	{
		return view('index', ['test' => 'awesome']);
	}

	public static function postHome()
	{
		//return View::redirect('testpage');
		return View::render('index', ['test' => Request::get('username', 'no name')]);
	}

	public static function test()
	{
		return View::render('test');
	}
}