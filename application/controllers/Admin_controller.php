<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_controller extends CI_Controller {

        //Add new user
        public function create_user_admin() {
            
            $data['users'] = $this->user_model->all_user();
            $data['title'] = 'Add User';

            $this->form_validation->set_rules('first_name','First Name','required');
            $this->form_validation->set_rules('last_name','Last Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('username','Username','required|min_length[6]|callback_check_username_exists');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

            if($this->form_validation->run() === FALSE) {    
                $this->load->view('templates/header');
                $this->load->view('admin/create_admin_user',$data);
                $this->load->view('templates/footer');
            } else {
                //Encrypt password
                $enc_password = md5($this->input->post('password'));
                $this->admin_model->create_user_admin($enc_password);
                redirect('admin_controller/user_admin');
            }
        }

        //Admin function
        public function user_admin() {

            $data['users'] = $this->user_model->all_user();
           
            $this->load->view('templates/header');
            $this->load->view('admin/user_admin',$data);
            $this->load->view('templates/footer');
        }

        public function edit_admin_user($id) {       
            $data['title'] = 'Edit User';
            $data['user'] = $this->admin_model->edit_admin_user($id); 

            $this->load->view('templates/header');
            $this->load->view('admin/edit_admin_user',$data);
            $this->load->view('templates/footer');
        }

        //Upadate user
        public function update_admin_user($id) {
            $this->admin_model->update_admin_user($id);
            redirect('admin_controller/user_admin');
        }

         //Delete user
         public function delete_user($id) {
            $this->admin_model->delete_user($id);
            redirect('admin_controller/user_admin');
        }

        //Custom function for checking if username exists
        public function check_username_exists($username) {
            $this->form_validation->set_message('check_username_exists','Username is already taken, pick another one');
            
            if($this->admin_model->check_username_exists($username)) {
                return true;
            } else {
                return false;
            }
        }

        


    }