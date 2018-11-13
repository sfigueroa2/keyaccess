<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StudentController extends CI_Controller{

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
          $this->load->view('StudentView/StudentMenu');
    }
    public function Request(){
      $username = ($this->session->userdata['logged_student']['username']);
      $data['faculty'] = $this->KeyAccessModel->get_faculty();
      $data['room'] = $this->KeyAccessModel->get_rooms();
      $data['student'] = $this->KeyAccessModel->get_studentInfo($username);
      $sid = $data['student'][0]['Id'];
      $this->load->view('Templates/header');

      if($data['student'][0]['Classification'] == 'Graduate'){
          $this->load->view('StudentView/GRequest',$data);
      }  else{//UG Request

          if ($this->form_validation->run() == FALSE) {
            $this->load->view('StudentView/Request',$data);
          } else {
          $this->KeyAccessModel->insert_Request($sid);
          $data['message'] = 'Data Inserted Successfully';
          $this->load->view('StudentView/Request',$data);
      }

      }
    }
    public function myRequest(){
      $username = ($this->session->userdata['logged_student']['username']);
      $data['student'] = $this->KeyAccessModel->get_studentInfo($username);
      $sid = $data['student'][0]['Id'];
      $data['myRequest'] = $this->KeyAccessModel->get_my_Request($sid);
      $this->load->view('Templates/header');
      $this->load->view('StudentView/myRequest',$data);

    }
}
