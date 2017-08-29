<?php if ( ! defined('BASEPATH')) exit('No direct access allowed');

class Admin_facebook_module extends Admin_Controller {

	public function index($module = array()) {
		$this->lang->load('facebook_module/facebook_module');

        $this->user->restrict('Module.FacebookModule');

        if (!empty($module)) {
            $title = (isset($module['title'])) ? $module['title'] : $this->lang->line('_text_title');

            $this->template->setTitle('Module: ' . $title);
            $this->template->setHeading('Module: ' . $title);
            $this->template->setButton($this->lang->line('button_save'), array('class' => 'btn btn-primary', 'onclick' => '$(\'#edit-form\').submit();'));
            $this->template->setButton($this->lang->line('button_save_close'), array('class' => 'btn btn-default', 'onclick' => 'saveClose();'));
            $this->template->setButton($this->lang->line('button_icon_back'), array('class' => 'btn btn-default', 'href' => site_url('extensions')));

			if ($this->input->post() AND $this->_updateModule() === TRUE) {
				if ($this->input->post('save_close') === '1') {
					redirect('extensions');
				}

				redirect('extensions/edit/module/facebook_module');
			}

			$ext_data = array();
            if (!empty($module['ext_data']) AND is_array($module['ext_data'])) {
                $ext_data = $module['ext_data'];
            }

	        if (isset($ext_data['facebook_app_id'])) {
		        $data['facebook_app_id'] = $ext_data['facebook_app_id'];
	        } else if ($this->input->post('facebook_app_id')) {
		        $data['facebook_app_id'] = $this->input->post('facebook_app_id');
	        } else {
		        $data['facebook_app_id'] = '';
	        }

	        if (isset($ext_data['facebook_app_secret'])) {
		        $data['facebook_app_secret'] = $ext_data['facebook_app_secret'];
	        } else if ($this->input->post('facebook_app_secret')) {
		        $data['facebook_app_secret'] = $this->input->post('facebook_app_secret');
	        } else {
		        $data['facebook_app_secret'] = '';
	        }

	        if (isset($ext_data['facebook_login_type'])) {
		        $data['facebook_login_type'] = $ext_data['facebook_login_type'];
	        } else if ($this->input->post('facebook_login_type')) {
		        $data['facebook_login_type'] = $this->input->post('facebook_login_type');
	        } else {
		        $data['facebook_login_type'] = '';
	        }

	        if (isset($ext_data['facebook_auth_on_load'])) {
		        $data['facebook_auth_on_load'] = $ext_data['facebook_auth_on_load'];
	        } else if ($this->input->post('facebook_auth_on_load')) {
		        $data['facebook_auth_on_load'] = $this->input->post('facebook_auth_on_load');
	        } else {
		        $data['facebook_auth_on_load'] = '1';
		    }

	        if (isset($ext_data['facebook_login_redirect_url'])) {
		        $data['facebook_login_redirect_url'] = $ext_data['facebook_login_redirect_url'];
	        } else if ($this->input->post('facebook_login_redirect_url')) {
		        $data['facebook_login_redirect_url'] = $this->input->post('facebook_login_redirect_url');
	        } else {
		        $data['facebook_login_redirect_url'] = 'login';
	        }

            if (isset($ext_data['facebook_logout_redirect_url'])) {
		        $data['facebook_logout_redirect_url'] = $ext_data['facebook_logout_redirect_url'];
	        } else if ($this->input->post('facebook_logout_redirect_url')) {
		        $data['facebook_logout_redirect_url'] = $this->input->post('facebook_logout_redirect_url');
	        } else {
		        $data['facebook_logout_redirect_url'] = 'logout';
	        }


			if (isset($this->input->post['facebook_permissions']) AND is_array($this->input->post['facebook_permissions'])) {
				$data['facebook_permissions'] = $this->input->post('facebook_permissions');
			} else if (isset($ext_data['facebook_permissions']) AND is_array($ext_data['facebook_permissions'])) {
				$data['facebook_permissions'] = $ext_data['facebook_permissions'];
			} else {
				$data['facebook_permissions'] = array('email','public_profile');
			}

	        if (isset($ext_data['facebook_graph_version'])) {
		        $data['facebook_graph_version'] = $ext_data['facebook_graph_version'];
	        } else if ($this->input->post('facebook_graph_version')) {
		        $data['facebook_graph_version'] = $this->input->post('facebook_graph_version');
	        } else {
		        $data['facebook_graph_version'] = 'v2.9';
	        }

	        if (isset($this->input->post['status'])) {
				$data['status'] = $this->input->post('status');
			} else if (isset($ext_data['status'])) {
				$data['status'] = $ext_data['status'];
			} else {
				$data['status'] = '';
			}

	        $data['list_facebook_permissions'] = array(
			'email'             => $this->lang->line('text_email'),
			'public_profile'	=> $this->lang->line('text_public_profile'),
			'publish_actions'   => $this->lang->line('text_publish_actions'),
			'user_birthday'		=> $this->lang->line('text_user_birthday'),
			'user_hometown'     => $this->lang->line('text_user_hometown'),
			'user_likes'		=> $this->lang->line('text_user_likes'),
			'user_location'     => $this->lang->line('text_user_location'),
			'user_photos'		=> $this->lang->line('text_user_photos'),
			'user_posts'        => $this->lang->line('text_user_posts'),
			'user_friends'		=> $this->lang->line('text_user_friends'),
			'user_videos'		=> $this->lang->line('text_user_videos'),
			'user_tagged_places'=> $this->lang->line('text_user_tagged_places'),
			'user_work_history' => $this->lang->line('text_user_work_history'),
			'ads_read'			=> $this->lang->line('text_ads_read'),
			
			);         

		       
			return $this->load->view('facebook_module/admin_facebook_module', $data, TRUE);
        }
	}

	private function _updateModule() {
		$this->user->restrict('Module.FacebookModule.Manage');

    	if ($this->validateForm() === TRUE) {

			if ($this->Extensions_model->updateExtension('module', 'facebook_module', $this->input->post())) {
				$this->alert->set('success', sprintf($this->lang->line('alert_success'), $this->lang->line('_text_title').' module '.$this->lang->line('text_updated')));
            } else {
                $this->alert->set('warning', sprintf($this->lang->line('alert_error_nothing'), $this->lang->line('text_updated')));
			}

			return TRUE;
		}
	}

 	private function validateForm() {
		$this->form_validation->set_rules('facebook_app_id', 'lang:label_facebook_app_id', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_app_secret', 'lang:label_facebook_app_secret', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_login_type', 'lang:label_facebook_login_type', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_auth_on_load', 'lang:label_facebook_auth_on_load', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_login_redirect_url', 'lang:label_facebook_login_redirect_url', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_logout_redirect_url', 'lang:label_facebook_logout_redirect_url', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_permissions[]', 'lang:label_facebook_permissions', 'xss_clean|trim|required');
		$this->form_validation->set_rules('facebook_graph_version', 'lang:label_facebook_graph_version', 'xss_clean|trim|required');
		$this->form_validation->set_rules('status', 'lang:label_status', 'xss_clean|trim|required|integer');

		if ($this->form_validation->run() === TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Admin_facebook_module.php */
/* Location: ./extensions/facebook_module/controllers/Admin_facebook_module.php */
