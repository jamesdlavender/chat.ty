<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __Construct()
    {
        parent::__Construct();
		$this->load->model('login_model');
    }
	function authenticate() {
	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if($this->form_validation->run() == FALSE) 
		{
			$this->session->set_flashdata('error', 'Wrong username/password combination entered, please try again');
		}
		else
		{
        $session_id = $this->session->userdata('session_id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->login_model->authenticate($username,$password);
        if (count($result) > 0) {
            $this->login_model->store_session($username,$session_id);
            $this->session->set_userdata(array('username' => $username, 'logged_in'=>TRUE));
			$this->successful();
        }
		else
		{
			$this->session->set_flashdata('error', 'Wrong username/password combination entered, please try again');
			redirect('main');
		}
		}
    }

    function register(){

    	$userdata = array('username' => $_POST['username'],
    					  'password' => sha1($_POST['password'])
   		);

		if(isset($_FILES['image'])){

			$upload_response = $this->upload_photo('image');
			if($upload_response['success']){
				$userdata['image']  = $upload_response['upload_data']['file_name'];
			}
			else{
				$userdata['image']  = '';
				$this->session->set_flashdata('error', $upload_response['msg']);
			}
		 }
			$this->login_model->register($userdata);
			$this->session->set_flashdata('success', 'Your account has been created successfully, please login !!');
			redirect('main');
		 
    }

    function successful() {
		redirect('home');
    }

    function username_validate(){
    	$response [] = $_GET['fieldId'];
    	if($this->login_model->username_validate()){
    		$response[] = true;
    	}
    	else{
    		$response[] = false;
    	}
    	echo json_encode($response);
    }
    function image_validate(){
    	$image_name  = $_GET['fieldValue'];
    	$response [] = $_GET['fieldId'];		
		$extension= strtolower(end(explode(".",$image_name)));
		$ext = array('jpg', 'jpeg', 'png');
		if(!in_array($extension,$ext))
		{	
			$response[] = false;
			$response[] = 'File not valid, use .jpg, .jpeg or .png';					
		}
		else 
		{
			$response[] = true;
		}
		echo json_encode($response);
    }
	
	function logout()
	{
		$session_user = $this->session->userdata('username');
		$this->login_model->remove_session_id($session_user);
		$array_items = array('username' => '','logged_in'=>FALSE);
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('main');
	}
/*-----------------------------------------------------------------------------------------------------------------------
	function to upload user photos
-------------------------------------------------------------------------------------------------------------------------*/
	public function upload_photo($fieldname) {
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = UPLOADSDIR;
		// set the filter image types
		$config['allowed_types'] = 'png|gif|jpeg|jpg';
		$config['max_width'] = '500'; 
		$this->load->helper('string');
		$config['file_name']	 = random_string('alnum', 32);
		//load the upload library
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		//if not successful, set the error message
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('success' => false, 'msg' => $this->upload->display_errors());
		}
		else
		{ 
			$upload_details = $this->upload->data(); //uploading

			$config1 = array(
			      'source_image' => $upload_details['full_path'], //get original image
			      'new_image' => UPLOADSDIR, //save as new image //need to create thumbs first
			      'maintain_ratio' => true,
			      'width' => 32,
			      'height' => 32
			    );
		    $this->load->library('image_lib', $config1); //load library
		    $this->image_lib->resize(); //generating thumb
			$data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");
		}
		return $data;
	}
}

