<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct()
	{
    
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		
	}

}
 
 /**
  * summary
  */
 class CLIENT_Controller extends MY_Controller
 {
     /**
      * summary
      */
     public $cms;

     public function __construct()
     {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->cms      = $this->db->where("id_settings",1)->get("settings");   
        
        $this->company    = $this->db->where("id",1)->get("setting_frontend")->row();  
        $this->portofolio = $this->db->select("id,name")->get("portofolio_category"); 
      }
}
/**
* summary
*/
class ADMIN_Controller extends MY_Controller{
  /**
  * summary
  */
  public $user;
  public $cms;
  public $desa;
  public function __construct(){
  parent::__construct();
    if (!$this->ion_auth->is_admin()){
      redirect('/admin/auth/login', 'refresh');
      //return show_error('You must be an administrator to view this page.');
    }
    $this->user = $this->ion_auth->user()->row();
    $this->cms = $this->db->where("id_settings",1)->get("settings"); 
  }
  
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */