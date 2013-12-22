<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }
}