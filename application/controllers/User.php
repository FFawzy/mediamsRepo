<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_m');
    }

    public function index()
    {
        if($this->session->userdata('user_data') != null){
            if($this->session->userdata('user_data')['type']=='admin'){

                $viewdata['headers'] = array('Username','Country','Type');
                $viewdata['Data'] = $this->User_m->get($viewdata['headers'],null);
                $viewdata['controller'] = 'User';

                $pagename['pagename'] = "users";
                $this->load->view('include/header.php',$pagename);
                $this->load->view('users/index.php',$viewdata);
                 $this->load->view('include/footer.php');

        }else{
            echo 'NOT AUTHORIZED';
        }

      }else{
            $this->load->view('login');
        }
    }

    public function add(){

        if($this->session->userdata('user_data') != null){
          if($this->session->userdata('user_data')['type']=='admin'){

                $rules = $this->User_m->_rules_add;

                $this->form_validation->set_rules($rules);
                if($this->form_validation->run() == TRUE){


                        $data['username'] = $this->input->post('username');
                        $data['password'] = $this->User_m->hash($this->input->post('password'));
                         $data['country'] = 'EG';
                          $data['type'] = $this->input->post('type');
                          date_default_timezone_set("America/Chicago");
                          $tempdate = getdate();
                          $strdate = $tempdate['year']."-".$tempdate['mon']."-".$tempdate['mday']." ".$tempdate['hours'].":".$tempdate['minutes'].":".$tempdate['seconds'];
                          $data['date_created'] = $strdate;


                        $this->User_m->save($data);
                        echo "<script> alert('user added');</script>";

                        redirect(base_url().'User');

                }
                echo '<script> alert("Error, '.validation_errors().' ");</script>';
                redirect(base_url().'User');



        }else{
          echo 'NOT AUTHORIZED';
        }
      }else{
            $this->load->view('login');
        }
    }



    public function update(){
        if($this->session->userdata('user_data') != null){

                $data['email'] = $this->input->post('email');
                $data['type'] = $this->input->post('type');
                $where = array('username' => $this->input->post('username'));
                $this->User_m->update($data,$where);

        }
        else{
            $this->load->view('login');
        }

    }

    public function delete($id){
        if($this->session->userdata('user_data') != null){

            $this->db->delete('user', array('id' => $id));
            echo "<script> alert('user deleted');</script>";
            redirect(base_url().'index.php/user',refresh);
        }
        else{
            $this->load->view('login');
        }


    }



}
