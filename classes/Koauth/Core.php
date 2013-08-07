<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Koauth helper class
 * 
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Koauth
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    MIT License http://opensource.org/licenses/MIT
 */

class Koauth_Core {
	
	public static function auto_load($class)
	{
		return Kohana::auto_load($class, 'vendor/oauth2-server-php/src');
	}
	
}
