<?php
namespace App\Controllers;

use App\Framework\Core\Controller;
use App\Framework\Core\Request;
use App\Framework\Core\Session;
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
		$foo = Session::get('bar', 'empty');
		return view('index', 
			[
				'test' => 'awesome', 
				'session' => $foo
			]
		);
	}

	public static function postHome()
	{
		Session::set('bar', 'saved');
		return view('index', 
			[
				'test' => Request::get('username', 'no name'), 
				'session' => 'POSTED'
			]
		);
	}

	public static function test()
	{
		return view('test');
	}
}