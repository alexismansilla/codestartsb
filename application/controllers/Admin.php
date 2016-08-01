<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
 	{
 	parent::__construct();
 	}//construct()

	public function index()
	{
		//login check
		$this->check();

		//load dashboard as default page
		$this->dashboard();
	}//index()

	public function check()
	{
		if (!$this->ion_auth->logged_in())
		{
			//no session
			redirect('admin/login', 'refresh');
			exit();
		}//if
	}//check()

	public function login()
	{
		//check if there is session
		if ($this->ion_auth->logged_in())
		{
			redirect('admin/dashboard', 'refresh');
			exit();
		}//if

		 	//load languages files
 			$this->lang->load('login');
		//view data
		$data = array(
			'title'=>sprintf(lang('login_title'),$this->config->item('site_name')),
			'scripts'=>array(
				'bower_components/jqvalid/jquery.validationEngine.js',
				'bower_components/jqvalid/jquery.validationEngine-english.js',
				'js/login.js'
				),
			'plugin_css'=>array(
				'bower_components/jqvalid/validationEngine.jquery.css'
				)
			);
		//load login view
		$this->load->view('admin/layouts/main_header', $data);
		$this->load->view('admin/login');
		$this->load->view('admin/layouts/main_footer');
	}//function

	public function ajax_login()
	{
		//check if this is ajax request
		if(!$this->input->is_ajax_request())
		{
			$this->output->set_status_header('400');
			exit('Access Deny');
		}
			//load validation library
			$this->load->library('form_validation');

			//load login langouage
 			$this->lang->load('login');

			//form validation
			$this->form_validation->set_rules('identity',lang('login_email'),'required');
			$this->form_validation->set_rules('password',lang('login_password'),'required');
			if ($this->form_validation->run() === TRUE)
			 {
				$remember = (bool) $this->input->post('remember');

				//do login and check
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
				{
					//login success
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'true',
						'message'=>lang('login_success'))
				));

				}//if
				else
				{
					//login failed
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>lang('login_failed'))
				));
				}//else

			 }//if 
			else
			{
				//login failed
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>validation_errors())
				));
			}//else
	}//function

	public function test()
	{
		//login check
		$this->check();
		echo "string";
	}

	public function profile()
	{
		//login check
		$this->check();
		
		//load lang files
		$this->lang->load('profile');

		//dashboard data
		$data = array(
			'title'=>sprintf(lang('profile_title'),$this->config->item('site_name')),
			'scripts'=>array(
				'bower_components/jqvalid/jquery.validationEngine.js',
				'bower_components/jqvalid/jquery.validationEngine-english.js',
				'js/profile.js'
				),
			'plugin_css'=>array(
				'bower_components/jqvalid/validationEngine.jquery.css'
				)
			);//array
		admin_render('profile',$data);

	}//function

	public function ajax_password()
	{

		$this->check();
		//check if this is ajax request
		if(!$this->input->is_ajax_request())
		{
			$this->output->set_status_header('400');
			exit('Access Deny');
		}
			//load validation library
			$this->load->library('form_validation');

			//load login langouage
 			$this->lang->load('profile');

			//form validation
			$this->form_validation->set_rules('cpassword',lang('profile_cpassword'),'required|callback__check_password');
			$this->form_validation->set_rules('npassword',lang('profile_npassword'),'required');
			$this->form_validation->set_rules('password',lang('profile_n2password'),'required');
			if ($this->form_validation->run() === TRUE)
			 {
			 	
				if($this->ion_auth->change_password($this->ion_auth->user()->row()->email,$this->input->post('cpassword'),$this->input->post('npassword')))
				{
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'true',
						'message'=>lang('profile_success'))
				));
				}//if
				else
				{
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>lang('profile_failed'))
				));
				}//else

			 }//if 
			else
			{
				//validation failed
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>validation_errors())
				));
			}//else
	}//function

public function ajax_profile()
	{

		$this->check();
		//check if this is ajax request
		if(!$this->input->is_ajax_request())
		{
			$this->output->set_status_header('400');
			exit('Access Deny');
		}
			//load validation library
			$this->load->library('form_validation');

			//load login langouage
 			$this->lang->load('profile');

			//form validation
			$this->form_validation->set_rules('username',lang('profile_username'),'required|callback__check_username');
			$this->form_validation->set_rules('email',lang('profile_email'),'required|callback__check_email');
			if ($this->form_validation->run() === TRUE)
			 {
			 	
				if($this->ion_auth->update($this->ion_auth->user()->row()->id,array(
					'username'=>$this->input->post('username'),
					'email'=>$this->input->post('email')
					)))
				{
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'true',
						'message'=>lang('profile_success'))
				));
				}//if
				else
				{
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>lang('profile_failed'))
				));
				}//else

			 }//if 
			else
			{
				//validation failed
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array(
						'status'=>'false',
						'message'=>validation_errors())
				));
			}//else
	}//function

	public function logout()
	{
		//login check
		$this->ion_auth->logout();
		redirect('admin/login','refresh');
		exit();
	}

	public function _check_username($username)
{
	//load login langouage
 	$this->lang->load('login');
	if($this->ion_auth->username_check($username) && $username != $this->ion_auth->user()->row()->username)
	{
		$this->form_validation->set_message('_check_username', lang('profile_error_exists_username'));
		return FALSE;
	}else
		return TRUE;
}

public function _check_email($email)
{
	//load login langouage
 	$this->lang->load('login');
	if($this->ion_auth->email_check($email) && $email != $this->ion_auth->user()->row()->email)
	{
		$this->form_validation->set_message('_check_email', lang('profile_error_exists_email'));
		return FALSE;
	}else
		return TRUE;
}

public function _check_password($password)
{
	//load login langouage
 	$this->lang->load('login');
	if($this->ion_auth->hash_password_db($this->ion_auth->user()->row()->id,$password) === FALSE)
	{
		$this->form_validation->set_message('_check_password', lang('profile_error_cpassword'));
		return false;
	}else
	return true;
}

}//class

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */