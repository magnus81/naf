<?php
namespace App\Controllers;

use App\Framework\Core\Controller;
use App\Framework\Core\Response;
use App\Framework\Core\Request;
use App\Framework\Core\Log;

/**
 * Pages controller
 *
 * @author Magnus <test@test.com>
 */

class Ajax extends Controller
{
	public static function test()
	{
		return Response::json(['username' => Request::get('username')]);
	}
}