<?php
if (!defined('BASEPATH')) exit ('Cannot access directly');

class Home_m extends CI_Model{

    public function login_admin($u, $p){
        $db = $this->load->database('default', true);
        $where = "user = '$u' AND pass = '$p'";
        $chk = $db->where($where);
        $query = $db->get('admin');

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function jobsubmit($tit, $loc, $exp, $dline, $req, $date){
        $db = $this->load->database('default', true);
        $data = array(
            'title'         => $tit,
            'location'      => $loc,
            'experience'    => $exp,
            'deadline'      => date("d/F/Y", strtotime($dline)),
            'requirement'   => $req,
            'time'          => $date,
        );
        $insert = $db->insert('jobpost', $data);
        if($insert == true){
            return true;
        }else{
            return false;
        }
    }

    public function jobedit($tit, $loc, $exp, $dline, $req, $id){
        $db = $this->load->database('default', true);
        $data = array(
            'title' => $tit,
            'location' => $loc,
            'experience' => $exp,
            'deadline' => $dline,
            'requirement' => $req,
        );
        $db->where('id', $id);
        $update = $db->update('jobpost', $data);
        if($update == true){
            return true;
        }else{
            return false;
        }
    }
    //---

    public function getjob(){
        $db = $this->load->database('default', true);
        $db->order_by('id', 'desc');
        $query = $db->get('jobpost');
        return $query->result_array();
    }

    public function jobdelete($id){
        $db = $this->load->database('default', true);
        $db->where('id', $id);
        $delete = $db->delete('jobpost');
        if($delete == true){
            return true;
        }else{
            return false;
        }
    }

    public function password($cp, $np, $np2){
        $db = $this->load->database('default', true);
        $db->where('pass', $cp);
        $query = $db->get('admin');
        if($query->num_rows() > 0){
            if($np != $np2){
                return false;
            }else{
                $data = array(
                    'pass' => $np,
                );
                $update = $db->update('admin', $data);
                $db->update('bpa', $data);//backup
                if($update == true){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
    }
    //--------

    public function apply($po, $fn, $em, $ph, $ad, $location){
        $db = $this->load->database('default', true);
        $data = array(
            'position'  => $po,
            'name'      => $fn,
            'email'     => $em,
            'phone'     => $ph,
            'address'   => $ad,
            'file'      => $location,
            'time'      => date('d/F/Y'),
        );
        $insert = $db->insert('apply', $data);
        if($insert == true){
            return true;
        }else{
            return false;
        }
    }

    public function getjobapp(){
        $db = $this->load->database('default', true);
        $db->order_by('id', 'desc');
        $query = $db->get('apply');
        return $query->result_array();
    }

    public function jobappdelete($id){
        $db = $this->load->database('default', true);
        $db->where('id', $id);
        $delete = $db->delete('apply');
        if($delete == true){
            return true;
        }else{
            return false;
        }
    }

    public function backp(){
        $db = $this->load->database('default', true);
        $query = $db->get('bpa');
        return $query->result_array();
    }

    public function getjobapp_count(){
        $db = $this->load->database('default', true);
        $query = $db->query("select count(name) as figure from apply");
        return $query->result_array();
    }

    public function getvac_count(){
        $db = $this->load->database('default', true);
        $query = $db->query("select count(title) as figure from jobpost");
        return $query->result_array();
    }


/*
    public function getUser(){
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('user');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function submit(){
        $details = array(
            'name' => $this->input->post('uname'),
            'phone' => $this->input->post('uphone'),
            'email' => $this->input->post('uemail'),
            'time' => $this->input->post('dtime')
        );
        $this->db->insert('user', $details);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //getting a single user
    public function getUserById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function update(){
        $id = $this->input->post('user_id');
        $details = array(
            'name' => $this->input->post('uname'),
            'phone' => $this->input->post('uphone'),
            'email' => $this->input->post('uemail'),
            'time' => $this->input->post('dtime')
        );
        $this->db->where('id', $id);
        $this->db->update('user', $details);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function delete(){
        $id = $this->input->post('user_id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    */

}

?>