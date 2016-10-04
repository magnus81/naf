<?php
namespace App\Controllers;

use App\Framework\Core\Controller;
use App\Framework\Core\Request;
use App\Framework\Core\View;
use App\Framework\Core\Log;
use App\Framework\Core\DB;

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