<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tester extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
        date_default_timezone_set('asia/jakarta');
        $this->load->view('admin/index');
    }
}
