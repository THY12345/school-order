<?php
namespace Common\Model;
use Think\Model;

class UserModel extends Model {
	private $_db = '';
    private $_db2 = '';
    private $_db3 = '';

	public function __construct() {
		$this->_db = M('time');
        $this->_db2 = M('name');
        $this->_db3 = M('order');
	}

    public function getTimeByTname($username=''){

    	$user = $this->_db->where('username="'.$username.'"')->select();
    	return $user;
    }

    public function add($data=array()){
    	if(!$data || !is_array($data)){
    		return 0;
    	}
    	return $this->_db->add($data);
    }

    public function deleteById($id=''){
    	return $this->_db->where('id="'.$id.'"')->delete();
    
    }

    public function searchByName($name=''){
        // $ret = $this->_db2->where('name="'.$name.'"')->getField('username');
        // $ret2 = $this->_db->where('username="'.$ret.'" and status="1"')->select();
        // return $ret2;
        return $this->_db2->join('time ON time.username =name.username')->where('name="'.$name.'"')->field('time.id as id,name.username as username,name.name as name,time.date as date,time.stime as stime,time.etime as etime,time.status as status')->select();

    }
    public function getStatus($id=''){
        return $this->_db->where('id="'.$id.'"')->getField('status');
    }
    public function getTime($id=''){
        $date = $this->_db->where('id="'.$id.'"')->getField('date');
        $etime = $this->_db->where('id="'.$id.'"')->getField('etime');
        return $date.' '.$etime.':00' ;
    }
    public function changeStatus($id='',$data=array()){
        $data['status'] = '0';
        return $this->_db->where('id="'.$id.'"')->save($data);
    }
    public function insertToOrder($data){
        return $this->_db3->add($data);
    }

    public function searchByUsername($username=''){
        return $this->_db3->join('time ON time.id = order.uid')->join('name ON time.username =name.username')->where('order.username="'.$username.'"')->field('order.id as id,time.username as username,order.uid as uid,name.name as name,time.date as date,time.stime as stime,time.etime as etime')->select();
        //where('username="'.$username.'"')->select();
    }
    // join('time ON time.id = order.uid')->join('name ON time.username =name.username')->where('order.username="'.$username.'"')->field('order.id as id,order.username as username,name.name as name,time.stime as stime,time.etime as etime')->select();

    public function getUidById($id=''){
        return $this->_db3->where('id="'.$id.'"')->getField('uid');
    
    }

    public function deleteById3($id=''){
        return $this->_db3->where('id="'.$id.'"')->delete();
    
    }
    public function changeStatusByUid($uid=''){
        $data['status'] = '1';
        return $this->_db->where('id="'.$uid.'"')->save($data);
    }

    public function getInformation($username=''){
        return $this->_db2->where('username="'.$username.'"')->find();
    }

    public function saveInfor($username='',$data=array()){
        $data1['username']=$data['username'];
        M()->startTrans();
        $ret = $this->_db->where('username="'.$username.'"')->save($data);
        $ret2 = $this->_db2->where('username="'.$username.'"')->save($data1);
        $ret3 = $this->_db3->where('username="'.$username.'"')->save($data1);
        if(false !== $ret || 0 !== $ret ||false !== $ret2 || 0 !== $ret2 || false !== $ret3 || 0 !== $ret3){
            M()->commit();
            return 1;
        }else{
            M()->rollback();
            return 0;
        }
        
    }

    public function getSidByUsername($username=''){
        return $this->_db2->where('username="'.$username.'"')->getField('sid');
    
    }

    public function getOrderInfo($username=''){
        // return $this->_db->join('order ON time.id = order.uid')->join('name ON order.username =name.username')->where('time.username="'.$username.'"')->field('order.id as id,order.username as username,order.uid as uid,name.name as name,time.stime as stime,time.etime as etime')->select();
        return $this->_db3->join('time ON time.id = order.uid')->join('name ON order.username =name.username')->where('time.username="'.$username.'"')->field('order.id as id,order.username as username,order.uid as uid,name.name as name,time.stime as stime,time.etime as etime')->select();
    }
}


?>