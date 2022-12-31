<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller {


	public $header = 'admin/includes/header';
	public $leftMenu  = 'admin/includes/leftside_menu';
	public $footer = 'admin/includes/footer';
	public $list_roles='admin/roles/list_roles';
	public $add_roles='admin/roles/add_roles';


    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->is_logged_in();

        $this->load->model('admin/Rolesmodel','my_model');
	    $this->load->model('Common_model','common_model');

        $this->load->helper('url', 'form', 'HTML');
        $this->load->library(array('form_validation', 'session'));

        $this->session->set_userdata('user_id','ADM0001');
    }

    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('admin/login', 'refresh');
        }
    }



    public function roles()
	{		

		//$this->data['url']='admin/roles/roles/';
		if($this->session->userdata('user_id') != 'ADM0001'){
		 $data['roleResponsible'] = $this->common_model->get_responsibilities();
	     }else{
		 $data['roleResponsible'] = $this->common_model->get_default_responsibilities();
		 }
		$this->setHeaderFooter($this->list_roles,$data);
	}


	public function add_roles()
	{  
		if($this->session->userdata('user_id') != 'ADM0001'){
		 $data['roleResponsible'] = $this->common_model->get_responsibilities();
	     }else{
		 $data['roleResponsible'] = $this->common_model->get_default_responsibilities();
		 }

		
		$data['module_names'] = $this->common_model->module_names();
		if($this->input->post('submit') != ''){
				//echo '<pre>';print_r($this->input->post());exit;
				if($this->input->post('method')!=''){
							$exit_data = array(
								'rolename' => ($this->input->post('rolename')),
								'state_id' => $this->input->post('state_id'),
								'organisation_id' => $this->input->post('organisation_id'),
								'center_id' => $this->input->post('center_id'),
							);				
							$exit_details = $this->my_model->exit_details($exit_data);

							if($exit_details == 0){
								$result = $this->my_model->add_record();
								if(!empty($result)){
									$this->session->set_flashdata('success', 'Inserted Successfully...');
								}else{
									$this->session->set_flashdata('error', 'Not Inserted....');
								}
								redirect(base_url().'admin/roles/roles');
							}else{
							$this->session->set_flashdata('error', 'Name Already Exists...');
							redirect(base_url().'admin/roles/add_roles');
							}

				}else{
					$this->session->set_flashdata('success', 'Please select any check box...');
					redirect(base_url().'admin/roles/add_roles');
				}
		}
		$this->setHeaderFooter($this->add_roles,$data);

	}




	/*-----------start setting header and footer --------------*/

	public function setHeaderFooter($view, $data)
	{	

		$this->load->view($this->header, $data);
		$this->load->view($this->leftMenu, $data);
		//$data['message']=$this->load->view('admin/includes/message',$data,TRUE);
		$this->load->view($view, $data);
		$this->load->view($this->footer);
	}
  /*----------- stop setting header and footer --------------*/



}