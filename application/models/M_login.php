<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
        
        function getUser($email, $password){
            $this->db->select('*');
            $this->db->from('login');
            $this->db->JOIN('user','login.noKTP = user.noKTP');
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
        }

        function getEmailUser($email){
            $this->db->select('*');
            $this->db->from('login');
            $this->db->JOIN('user','login.noKTP = user.noKTP');
            $this->db->where('email', $email);
            $query = $this->db->get();
            return $query;      
        }

        function getPassUser($password){
            $this->db->select('*');
            $this->db->from('login');
            $this->db->JOIN('user','login.noKTP = user.noKTP');
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
        }

        function ubahpasswordUser($email, $data){
            $this->db->where('email', $email);
            $this->db->update('login', $data);
        }
}