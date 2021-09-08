<?php

namespace App\Controllers\Kegiatan;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Models\CalonOsis;
use App\Models\UserModel;
use App\Models\KegiatanModel;
use App\Models\PemilihanOsisModel;
use CodeIgniter\Controller;

class KegiatanController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['array', 'form', 'url', 'date'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		$this->UserModel =  new UserModel();
		$this->KegiatanModel =  new KegiatanModel();
		$this->calonOsis =  new CalonOsis();
		$this->pemilihanOsis = new PemilihanOsisModel();

		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		$session = \Config\Services::session();
		$this->session = \Config\Services::session();

		$this->kegiatan = $this->KegiatanModel->getAllKegiatan();
		$this->user_id = $session->get('username');

		$this->user_name = $this->UserModel->get_user($this->user_id); // Get Login User ID


	}
}
