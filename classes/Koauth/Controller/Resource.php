<?php defined('SYSPATH') or die('No direct script access.');

/**
 * OAuth2 Resource Controller
 * 
 * Example resource controller to be extended or copied
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Koauth
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    MIT License http://opensource.org/licenses/MIT
 */
abstract class Koauth_Controller_Resource extends Controller {
	
	/**
	 * @var OAuth2_Server
	 */
	protected $_oauth2_server;
	
	/**
	 * @var string oauth2 scope required for access
	 */
	protected $scope_required = 'api';
	
	public function before()
	{
		parent::before();

		$this->_oauth2_server = new Koauth_OAuth2_Server();

		if (! $this->_check_access() )
		{
			return;
		}
	}
	
	protected function _check_access()
	{
		$request = Koauth_OAuth2_Request::createFromRequest($this->request);
		$response = new OAuth2_Response();
		$scopeRequired = $this->scope_required;
		if (! $this->_oauth2_server->verifyResourceRequest($request, $response, $scopeRequired)) {
			// if the scope required is different from what the token allows, this will send a "401 insufficient_scope" error
			$this->_oauth2_server->processResponse($this->response);
			return FALSE;
		}
		return TRUE;
	}
	
}
