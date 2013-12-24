<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['username']))
        {
            redirect('users/login');
        }
    }

    /* -----------------------------------------------------------------
    *
    *                       View Controllers
    *
    *  ----------------------------------------------------------------- */
    public function index()
    {
		$this->load->view('template/header');
    	$this->load->view('dashboard/_index');
    	$this->load->view('template/footer');
    }
    /* -----------------------------------------------------------------
    *
    *                     CRUD Helper Methods
    *
    * ----------------------------------------------------------------- */

    /* -----------------------------------------------------------------
    *
    *                     Helper Methods
    *
    * ----------------------------------------------------------------- */

}