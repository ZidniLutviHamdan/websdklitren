<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Created by SublimeText
 * User: Zidni
 * Date: 
 * Time: 
*/
class AdminModel extends CI_Model{
    public function lihat_user(){
        return $this->db->get('v_user');
    }
}
?>