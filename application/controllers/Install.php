<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Raj Shah
 *	date		: July, 2017
 *	W3 Developers School Management System 
 *	http://www.w3developers.com
 *	info@w3developers.co
 */

class Install extends CI_Controller
{
    
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        $this->load->view('backend/install');
    }
    
    
    
}
