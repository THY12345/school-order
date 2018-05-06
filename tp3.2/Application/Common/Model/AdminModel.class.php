<?php
namespace Common\Model;
use Think\Model;

class AdminModel extends Model {
	private $_db = '';
	private $_db2 = '';

	public function __construct() {
		$this->_db = M('user');
		$this->_db2 = M('name');

	}
   
    public function getAdminByUsername($username='') {
        $ret = $this->_db->where('username="'.$username.'"')->find();
        return $ret;
    }

    public function isexistByUsername($username='') {
        $ret = $this->_db2->where('username="'.$username.'"')->find();
        return $ret;
    }

    public function isexistBySid($sid=''){
    	$ret = $this->_db2->where('sid="'.$sid.'"')->find();
    	return $ret;
    }

    public function getType($username='') {
    	$ret = $this->_db2->where('username="'.$username.'"')->getField('type');
    	return $ret;
    }

    public function insertToUser($data=array()){
    	if(!$data || !is_array($data)){
    		return 0;
    	}
    	return $this->_db->add($data);
    }

    public function insertToName($data=array()){
    	if(!$data || !is_array($data)){
    		return 0;
    	}
    	return $this->_db2->add($data);
    }
    public function saveInfo($username='',$data=array()) {
        $data1['username']=$data['username'];
        $ret = $this->_db->where('username="'.$username.'"')->save($data1);
        if(false !== $ret || 0 !== $ret){
            return 1;
        }
        return 0;
    }

    public function getPassw($username=''){
        return $this->_db->where('username="'.$username.'"')->getField('password');
    
    }

    public function savePass($username='',$password=''){
        $data['password'] = $password;
        return $this->_db->where('username="'.$username.'"')->save($data);
    
    }
}


?>