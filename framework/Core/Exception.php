<?php
namespace App\Framework\Core;

/**
 * Exception
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Exception extends \Exception
{
	public function __construct($message, $code = 0, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
		
		// This should be protected somehow
		// So it can be selected if to be shown or not
		// Like a global DEBUG or someting
		$this->print_on_screen();
	}

	public function __toString()
	{
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}

	public function print_on_screen()
	{
		echo parent::getMessage() . ' in ' . parent::getFile() . ':' . parent::getLine() . '<br>';
		$trace = explode('#', parent::getTraceAsString());
		foreach($trace as $s) {
			if($s === '')
				continue;
			echo '#' . $s . '<br>';
		}
	}
}