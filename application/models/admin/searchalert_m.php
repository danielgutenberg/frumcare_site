<?php
/**
 * Created by PhpStorm.
 * User: pramod
 * Date: 8/20/15
 * Time: 7:09 PM
 */
class Searchalert_m extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->_table="tbl_searchhistory";
    }

    function get_all(){
        return $this->db->select('*')->from($this->_table)->join('tbl_user','tbl_user.id='.$this->_table.'.user_id')->join('tbl_care','tbl_care.id='.$this->_table.'.care_type')->order_by($this->_table.'.searcheddate','desc')->get()->result();
    }
}