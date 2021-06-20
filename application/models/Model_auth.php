<?php
class model_auth extends CI_Model{
    
    
    
    function login($username,$password,$level)
    {
        $chek=  $this->db->get_where('users',array('username'=>$username,'password'=>  md5($password),'level'=>1 ));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }

    function login_hrd($username,$password,$level)
    {
        $chek=  $this->db->get_where('users',array('username'=>$username,'password'=>  md5($password),'level'=>2 ));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    
    function tampildata()
    {
        return $this->db->get('users');
    }
    
    function get_one($id)
    {
        $param  =   array('id_users'=>$id);
        return $this->db->get_where('users',$param);
    }
}