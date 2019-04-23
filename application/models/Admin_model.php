<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin_model extends CI_Model {

        public function create_user_admin($enc_password) {
            //Get the user input
            $data = [
                'first_name' => ucfirst($this->input->post('first_name')),
                'last_name' => ucfirst($this->input->post('last_name')),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'user_type' => 'user'
            ];
            $this->db->insert('users',$data);
        }
        
        public function all_user() {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        public function edit_admin_user($id) {
            $query = $this->db->get_where('users',['id' =>$id]);
            return $query->row_array();
        }

        public function update_admin_user($id) {
            $data = [
                'first_name' => ucfirst($this->input->post('first_name')),
                'last_name' => ucfirst($this->input->post('last_name')),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'user_type' => $this->input->post('user_type')
            ];
            $this->db->where('id', $id);
            $this->db->update('users',$data);
        }

        public function delete_user($id) {
            $data = [
                'id' => $id
            ];

            $this->db->where('id',$id);
            $this->db->delete('users');
        }


        public function login_user($username,$password) {
            //Get the input from fields
            $this->db->where('username',$username);
            $this->db->where('password',$password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1) {
                return $result->row(0)->id;
            } else { 
                return false;
            }
        }

        public function is_admin($username,$password) {
            //Get the input from fields
            $this->db->where('username',$username);
            $this->db->where('password',$password);
           

            $result = $this->db->get_where('users',['user_type' => 'admin']);

            if($result->num_rows() == 1) {
                return $result->row(0)->id;
            } else { 
                return false;
            }
        }


        //  Check username exists
        public function check_username_exists($username) {
            $query = $this->db->get_where('users',['username'=> $username]);

            if(empty($query->row_array())) {
                return true; 
            } else {
                return false;
            }
        }
        

    }
?>