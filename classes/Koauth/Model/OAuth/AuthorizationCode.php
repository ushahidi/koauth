<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Model for OAuth Authorization Codes
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Koauth
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    MIT License http://opensource.org/licenses/MIT
 */
abstract class Koauth_Model_OAuth_AuthorizationCode extends ORM {

	/**
	 * Table primary key
	 * @var string
	 */
	protected $_primary_key = 'authorization_code';

	// Table Name
	protected $_table_name = 'oauth_authorization_codes';

	/**
	 * An authorization code belongs to a client and a user
	 *
	 * @var array Relationhips
	 */
	protected $_belongs_to = array(
		'client' => array(),
		'user' => array(),
		);

	// Insert/Update Timestamps
	protected $_created_column = array('column' => 'created', 'format' => TRUE);

	/**
	 * Filters for the Post model
	 * 
	 * @return array Filters
	 */
	public function filters()
	{
		return array(
			'authorization_code' => array(
				array('trim'),
			),
		);
	}

	/**
	 * Rules for the post model
	 *
	 * @return array Rules
	 */
	public function rules()
	{
		return array(
			'authorization_code' => array(
				array('not_empty'),
				array('alpha_numeric'),
			),
			
			'client_id' => array(
				array('not_empty'),
				array('alpha_dash'),
			),
			
			'user_id' => array(
				array('numeric'),
			),
			
			'redirect_uri' => array(
				array('url'),
			),
			
			'expires' => array(
				array('date'),
			),
			
			'scope' => array(
				//array('alpha_dash'),
			),
		);
	}
}
