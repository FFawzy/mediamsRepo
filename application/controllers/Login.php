<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_m');

    }

    public function index()
    {
        redirect(base_url());
    }


  public function login(){
        //$this->load->helper('url');
        $rules = $this->User_m->_rules;
        $this->form_validation->set_rules($rules);
        $where = array(
            'username' => $this->input->post('username'),
            'password' => $this->User_m->hash($this->input->post('password')),
        );

        if($this->form_validation->run() == TRUE){
            if($this->User_m->login($where) ===  TRUE){


                $urls=base_url();
                $this->load->helper('url');


                redirect($urls."Dashboard", 'refresh');

            }
            else{
                $this->session->set_flashdata('error', 'Invalid Username or Password!');
                #$this->login();
            }
        }
        $this->load->view('login');
    }

    public function logout(){
        $this->User_m->logout();
       redirect(base_url());
    }


  
}
