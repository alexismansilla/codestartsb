<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('admin_render')){

/*
Define the folder -> page -> data
 */

 function admin_render($page='start',$data=array(),$user='admin')
		{
		$ci=& get_instance();
		$ci->load->view('admin/layouts/main_header',$data);
		$ci->load->view('admin/layouts/header',$data);
		$ci->load->view('admin/'.$user.'/nav');
		$ci->load->view('admin/'.$user.'/'.$page.'',$data);
		$ci->load->view('admin/layouts/footer');
		$ci->load->view('admin/layouts/main_footer',$data);
		}
	}


if ( ! function_exists('public_render')){

/*
Define the folder -> page -> data
 */

 function public_render($page='start',$data=array())
		{
		$ci=& get_instance();
		$ci->load->view('public/layouts/main_header',$data);
		$ci->load->view('public/layouts/header',$data);
		$ci->load->view('public/layouts/nav');
		$ci->load->view('public/pages/'.$page.'',$data);
		$ci->load->view('public/layouts/footer');
		$ci->load->view('public/layouts/main_footer',$data);
		}
	}