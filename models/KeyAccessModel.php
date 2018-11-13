<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class KeyAccessModel extends CI_Model{
     function __construct(){
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }
    function get_studentLogin($usr, $pwd){
        $sql = "select * from Student where Username = '" . $usr . "' and Password = '" . $pwd . "' ''";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    function get_facultyLogin($usr, $pwd){
        $sql = "select * from Faculty where FUsername = '" . $usr . "' and FPassword = '" . $pwd . "' ''";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    function get_adminLogin($usr, $pwd){
        $sql = "select * from Admin where AUsername = '" . $usr . "' and APassword = '" . $pwd . "' ''";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    function get_faculty(){ //Populates Faculty in Student Key Request Form
        $this->db->select("Fname, FlastName");
        $this->db->from('faculty');
        $query = $this->db->get();
        return $query->result();
    }
    function get_rooms(){ //Populates Room in Student Key Request Form
        $this->db->select("Rnumber");
        $this->db->from('Room');
        $query = $this->db->get();
        return $query->result();
    }
    function get_studentInfo($username){ //Get Student Classification
        $array = array('Username'=> $username);
        $this->db->select("*");
        $this->db->from('Student');
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_facultyInfo($username){ //Get Student Classification
        $array = array('FUsername'=> $username);
        $this->db->select("*");
        $this->db->from('faculty');
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
   function insert_Request($sid){ //insert request
     $query = "INSERT INTO Request VALUES(NULL, $sid, 'admn01')";
     $result = $conn->query($query);
     $insertID = $result->insert_id;

     $data = array(
       'Renumber' => $insertID,
       'Restatus' => 'PENDING',
       'RWorkOrderNo' => $sid,
       'Rstart_date' =>$this->input->post('sdate'),
       'Rend_date' => $this->input->post('edate'),
       'RNoteInfo' => 'NULL',
       'RNoteDate' => 'NULL',
       'RNoteReminder' => 'NULL',
       'roomre' => $this->input->post('room'),
       'Reprofessor' => $this->input->post('pname'),
     );
     $query = "INSERT INTO Request_info VALUES('" . $data . "')";
     $result = $conn->query($query);
   }
   function get_my_Request($sid){
        $sql = "SELECT * from request_info as RI WHERE RI.Renumber IN ( SELECT R.Renumber FROM Request AS R WHERE R.Renumber = RI.Renumber AND R.id = '" . $sid . "')";
        $query = $this->db->query($sql);
        return $query->result();
   }
    function get_status(){
        $sql = "SELECT id STUDENT_ID, FirstName STUDENT_NAME, LastName STUDENT_LASTNAME, Renumber as REQUEST_NO, Rstatus REQUEST_STATUS from student natural join Request natural join request_info";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_reqRS(){ //request made per room, per semester
        $sql = "SELECT Roomre ROOM_NO, count(*) as Requests FROM Request_info where rstart_date >= '2018-08-20' AND Rstart_date <= '2018-12-15' group by roomre";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_faculty_assigned_room(){ //
        $sql = "SELECT Reprofessor as FACULTY_EMAIL, roomre as ROOM_ASSIGNED from Request_Info;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_graduating(){ //Upcoming Graduating Students
        $sql = "SELECT id, firstname First, lastname Last, expectedgrad Grad_Date FROM Student WHERE expectedgrad >= CURDATE() AND expectedgrad <= CURDATE() + INTERVAL 3 MONTH";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_bk_not_returned(){ //Students Not yet returned their brass keys
        $sql = "SELECT id STUDENT_ID, FirstName STUDENT_NAME, LastName STUDENT_LASTNAME from student where id IN (Select id from Brass_key where bkeyid IN(Select bkeyid  from brass_key_info where bkreturned = 'NO'))";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function showValidate(){
        $sql = "select s.id ID, s.FirstName 'Student Name', s.LastName 'Student Last Name', f.flastname 'Professor Last Name', a.rnumber ROOM, rq.rstatus 'Request Status', rq.rstart_date 'Access Start Date', rq.rend_date 'Access End Date' from faculty F join assigned_to A on f.FUsername= a.FUsername join validated V on V.FUsername = F.FUsername join request_info RQ on v.renumber= rq.renumber join request RP on rq.renumber=rp.renumber join student S on s.id = rp.id; ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function emailProfessor(){//email professor to validate access
        $sql = "select s.id ID, s.FirstName 'Student Name', s.LastName 'Student Last Name', f.flastname 'Professor Last Name', f.FUsername 'Professor email', a.rnumber ROOM, rq.rstatus 'Request Status', rq.rstart_date 'Access Start Date', rq.rend_date 'Access End Date' from faculty F join assigned_to A on f.FUsername= a.FUsername join validated V on V.FUsername = F.FUsername join request_info RQ on v.renumber= rq.renumber join request RP on rq.renumber=rp.renumber join student S on s.id = rp.id where s.id = 2;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_faculty_requests($fid){
      $sql = "select * from Request_info where Reprofessor = '" . $fid . "' ''";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
