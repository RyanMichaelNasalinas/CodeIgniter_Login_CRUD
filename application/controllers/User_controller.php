<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_controller extends CI_Controller {
        //Show all users
        public function index() {
            $data['users'] = $this->user_model->all_user();
           
            $this->load->view('templates/header');
            $this->load->view('user_view',$data);
            $this->load->view('templates/footer');
        }

        //Add new user
        public function register_user() {
            
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
                $this->load->view('register_user',$data);
                $this->load->view('templates/footer');
            } else {

                //Encrypt password
                $enc_password = md5($this->input->post('password'));
                 //Set error Message
                $this->session->set_flashdata('register_success','User registration is successful you can now login');
                $this->user_model->register_user($enc_password);
                redirect('user_controller/register_user');
            }
        }
        //Edit user info
        public function edit_user($id) {
          
            $data['title'] = 'Edit User';
            $data['user'] = $this->user_model->edit_user($id); 

            $this->load->view('templates/header');
            $this->load->view('edit_user',$data);
            $this->load->view('templates/footer');
        }
        //Upadate user
        public function update_user($id) {
            $this->user_model->update_user($id);
            redirect('user_controller');
        }
         //Delete user
        public function delete_user($id) {
            $this->user_model->delete_user($id);
            redirect('user_controller');
        }

        //Delete single user
        public function delete_account($id) {
            $this->user_model->delete_account($id);
            

            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_type');

            redirect('user_controller/login_user');
        }
        //Login user
        public function login_user() {
            $data['title'] = 'Login';
            //Set error message
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() === FALSE) {
                //Check if the validation if failed
                $this->load->view('templates/header');
                $this->load->view('login_user',$data);
                $this->load->view('templates/footer');
            } else {
                //Get username
                $username = $this->input->post('username');
                //Get and encrypt the password
                $password = md5($this->input->post('password'));
                //Login User
                
                if ($id = $this->admin_model->is_admin($username,$password)) {
                    $admin = [
                        'id' => $id,
                        'username' => $username,
                        'is_admin' => true,
                        'logged_in' => true
                    ];
                    //Set session
                    $this->session->set_userdata($admin);
                    redirect('admin_controller/user_admin');

                } elseif($id = $this->user_model->login_user($username,$password)) {
                    $user_data = [
                        'id' => $id,
                        'username' => $username,
                        'is_admin' => false,
                        'logged_in' => true
                    ];
                    //Set session
                    $this->session->set_userdata($user_data);
                    redirect('user_controller/index');
                } else {
                    //Set error Message
                    $this->session->set_flashdata('login_failed','Incorrect Username or Password');

                    redirect('user_controller/login_user');
                }
            }
        }
        //Log out User
        public function logout_user() {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_type');

            redirect('user_controller/login_user');
        }

         //Custom function for checking if username exists
         public function check_username_exists($username) {
            $this->form_validation->set_message('check_username_exists','Username is already taken, pick another one');
            
            if($this->user_model->check_username_exists($username)) {
                return true;
            } else {
                return false;
            }
        }

    }