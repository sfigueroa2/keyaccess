<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminController extends CI_Controller{

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
          $this->load->view('AdminView/AdminMenu');
          //$da= $data['request'] = $this->KeyAccessModel->emailProfessor();
          //print_r($da);
      }
      public function RequestRS(){ //Request Per Room Per semester
          $data['request'] = $this->KeyAccessModel->get_reqRS();
          $this->load->view('AdminView/RequestRS',$data);
      }
      public function RequestStatus(){ //Request Per Room Per semester
          $data['request'] = $this->KeyAccessModel->get_status();
          $this->load->view('AdminView/RequestStatus',$data);
      }
      public function FacultyAssignedRoom(){ //not working right
          $data['assigned'] = $this->KeyAccessModel->get_faculty_assigned_room();
          $this->load->view('AdminView/FacultyAssignedRoom',$data);
      }
      public function GraduatingStudents(){
        $data['grad'] = $this->KeyAccessModel->get_graduating();
        $this->load->view('AdminView/GraduatingStudents',$data);
      }
      public function BKtoReturn(){
        $data['key'] = $this->KeyAccessModel->get_bk_not_returned();
        $this->load->view('AdminView/BKtoReturn',$data);
      }
      public function emailProfessor(){
        $data['key'] = $this->KeyAccessModel->get_bk_not_returned();
        $this->load->view('AdminView/BKtoReturn',$data);
      }

}
