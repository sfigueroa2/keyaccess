<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FacultyController extends CI_Controller{

      public function __construct(){
          parent::__construct();
          $this->load->library('session');
          $this->load->library('form_validation');
          $this->load->helper('url');
          $this->load->database();
          $this->load->helper('html');
          $this->load->model('KeyAccessModel');
      }
      public function index(){
          $this->load->view('Templates/header');
          $this->load->view('FacultyView/facultyMenu');
      }
      public function FacultyRequests(){
        $username = ($this->session->userdata['logged_faculty']['username']);
        $data['faculty'] = $this->KeyAccessModel->get_facultyInfo($username);
        $fid = $data['faculty'][0]['FUsername'];
        $data['requests'] = $this->KeyAccessModel->get_faculty_requests($username);
        $this->load->view('Templates/header');
        $this->load->view('FacultyView/FacultyRequests',$data);

      }
}
