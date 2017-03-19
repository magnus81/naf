<?php
namespace App\Framework\Core;

/**
 * Auth
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Auth
{
	public static function attempt($credentials)
	{
		$stored_password = DB::selectVal('SELECT password FROM users WHERE username = ? LIMIT 1', [$credentials['username']]);
		return password_verify($credentials['password'], $stored_password);
	}

	public static function login($credentials)
	{
		if (self::attempt($credentials)) {
			Session::set('logged_in', true);
			return true;
		} else {
			return false;
		}
	}

	public static function logout()
	{
		Session::set('logged_in', false);
	}

	public static function user()
	{
		return Session::get('logged_in', false);
	}
}
