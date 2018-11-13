<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginController extends CI_Controller{

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
          $this->load->view('Login/login');
          $action = $this->input->post('action');
          if($action == 'student') {
            redirect("LoginController/slogin");
            }
          if($action == 'admin') {
            redirect("LoginController/alogin");
            }
          if($action == 'faculty') {
            redirect("LoginController/flogin");
            }
      }
      public function slogin(){
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $username = $this->input->post("username");
          $password = $this->input->post("password");

              if ($this->form_validation->run() == FALSE) {
                  if(isset($this->session->userdata['logged_student'])){ //Admin Page
                      redirect("StudentController/index");
                  }
                  else{
                      $this->load->view('Templates/headerlogin');
                      $this->load->view('Login/slogin');
                  }
              }  else {

                  //check if username and password is correct
                  $usr_result = $this->KeyAccessModel->get_studentLogin($username, $password);
                  if ($usr_result > 0){
                      //set the session variables
                      $sessiondata = array(
                          'login' => TRUE,
                          'username' => $username);
                      $sessiondata = array($this->session->set_userdata('logged_student', $sessiondata));
                      //redirect("PosterController/MainMenu");
                      redirect("StudentController/index");


                  }
                  else{
                      redirect('LoginController/slogin');
                    }
              }
          }
          public function flogin(){
              $this->form_validation->set_rules('username', 'Username', 'required');
              $this->form_validation->set_rules('password', 'Password', 'required');
              $username = $this->input->post("username");
              $password = $this->input->post("password");

                  if ($this->form_validation->run() == FALSE) {
                      if(isset($this->session->userdata['logged_faculty'])){ //Admin Page
                          redirect("StudentController/index");
                      }
                      else{
                          $this->load->view('Templates/headerlogin');
                          $this->load->view('Login/flogin');
                      }
                  }  else {

                      //check if username and password is correct
                      $usr_result = $this->KeyAccessModel->get_facultyLogin($username, $password);
                      if ($usr_result > 0){
                          //set the session variables
                          $sessiondata = array(
                              'login' => TRUE,
                              'username' => $username);
                          $sessiondata = array($this->session->set_userdata('logged_faculty', $sessiondata));
                          //redirect("PosterController/MainMenu");
                          redirect("FacultyController/index");


                      }
                      else{
                          redirect('LoginController/flogin');
                        }
                  }
              }
              public function alogin(){
                  $this->form_validation->set_rules('username', 'Username', 'required');
                  $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'You must provide a %s.'));
                  $username = $this->input->post("username");
                  $password = $this->input->post("password");

                      if ($this->form_validation->run() == FALSE) {
                          if(isset($this->session->userdata['logged_admin'])){ //Admin Page
                              redirect("StudentController/index");
                          }
                          else{
                              $this->load->view('Templates/headerlogin');
                              $this->load->view('login/alogin');
                          }
                      }  else {

                          //check if username and password is correct
                          $usr_result = $this->KeyAccessModel->get_adminLogin($username, $password);
                          if ($usr_result > 0){
                              //set the session variables
                              $sessiondata = array(
                                  'login' => TRUE,
                                  'username' => $username);
                              $sessiondata = array($this->session->set_userdata('logged_admin', $sessiondata));
                              //redirect("PosterController/MainMenu");
                              redirect("AdminController/index");


                          }
                          else{
                              redirect('LoginController/alogin');
                            }
                      }
                  }
      //logout judge
      public function logout() {
        $this->session->unset_userdata(array("login"=>FALSE,"username"=>"","uid"=>""));
        $this->session->sess_destroy();
        redirect('LoginController/index');
      }

}
