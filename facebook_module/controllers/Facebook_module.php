<?php if ( ! defined('BASEPATH')) exit('No direct access allowed');

class Facebook_module extends Main_Controller {

	public function __construct() {
		parent::__construct(); 																	// calls the constructor
		
		$this->load->library('facebook_module/Facebook_module_lib');			                // Load facebook library

		$this->load->library('customer');			
		
		$this->load->model('facebook_module/Facebook_model');									//Load facebook model

		$this->load->model('Customers_model');

		$this->lang->load('facebook_module/facebook_module');

    	
	}

	public function index(){
		 	 
		$this->template->setStyleTag(extension_url('facebook_module/views/stylesheet.css'), 'facebook-module-css', '144001');

		$userData = array();
		
		// Check if user is logged in
		if($this->facebook_module_lib->is_authenticated()){
			
			
			// Get user facebook profile details
			$userProfile = $this->facebook_module_lib->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture.width(800).height(800)');

            // Preparing data for database insertion
            $userData['oauth_provider'] 	= 'facebook';
            $userData['oauth_uid'] 			= $userProfile['id'];
            $userData['first_name'] 		= $userProfile['first_name'];
            $userData['last_name'] 			= $userProfile['last_name'];
            $userData['email']				= $userProfile['email'];
            $userData['gender']				= $userProfile['gender'];
            $userData['locale'] 			= $userProfile['locale'];
            $userData['profile_url'] 		= 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] 		= $userProfile['picture']['data']['url'];
            $userData['customer_group_id']	= '11';
            $userData['status']				= '1';
			
            

            // Insert or update user data
            $userID = $this->Facebook_model->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
			    if ($this->customer->login($userProfile['email'], '', TRUE)) {																		
                    log_activity($this->customer->getId(), 'logged in', 'customers', get_activity_message('activity_logged_in',
                        array('{customer}', '{link}'),
                        array($this->customer->getName(), admin_url('customers/edit?id='.$this->customer->getId()))
                    ));

					if ($redirect_url = $this->input->get('redirect')) {
						redirect($redirect_url);
					}
					$this->facebook_module_lib->destroy_session();           // Remove local Facebook session
					redirect('account/account');
  				}                
            } else {
               $data['userData'] = array();
            }
            
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook_module_lib->login_url();
            
        }		       

        // Load login view
        $this->load->view('facebook_module/facebook_module',$data);
    }

}

/* End of file facebook_module.php */
/* Location: ./extensions/facebook_module/controllers/facebook_module.php */
