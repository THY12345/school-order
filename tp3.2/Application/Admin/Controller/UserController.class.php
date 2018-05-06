<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class UserController extends Controller
{
	private $username='';
	private $type='';//这里声明
    public function _initialize(){
        $this->type=$_SESSION['adminUser']['type'];//这里赋值
        $this->username=$_SESSION['adminUser']['username'];
    }
	public function index(){
		//$type=$_SESSION['adminUser']['type'];
		$data = date("y-m-d",time());
		$this->assign('data',$data);
		$this->assign('type',$this->type);
		//$username=$_SESSION['adminUser']['username'];
		$user = D('User')->getTimeByTname($this->username);
		//$users = json_encode($user);
		$this->assign('users',$user);
		$this->assign('uname',$this->username);
		$this->display();
	}
	//$_SESSION['adminUser']['username']
	public function add(){
		if($_POST){
			if(!isset($_POST['date']) || !$_POST['date']){
				return show(0,'日期不可为空');
			}
			//return show(0,date('y-m-d h:i:s',time()));
			if(!isset($_POST['stime']) || !$_POST['stime']){
				return show(0,'开始时间不可为空');
			}
			if(!isset($_POST['etime']) || !$_POST['stime']){
				return show(0,'结束时间不可为空');
			}
			$stime = strtotime($_POST['date'].' '.$_POST['stime'].':00');
			$etime = strtotime($_POST['date'].' '.$_POST['etime'].':00');
			$nowtime = strtotime(date('y-m-d h:i:s',time()));
			$dvalue = ceil(($etime-$stime)/60);
			if($stime < $nowtime){
				return show(0,'时间已过');
			}
			if($dvalue <5 || $devalue>30){
				return show(0,'请输入适当的时间差');
			}
			$timeid = D('User')->add($_POST);
			if($timeid){
				return show(1,'添加成功');
			}else{
				return show(0,'添加失败');
			}
		}else{
			$this->redirect('/index.php?m=admin&c=user&a=index');
		}
	}

	public function delete(){
		$id = $_POST['id'];
		$status = D('User')->getStatus($id);
		if($status=='1'){
			$ret = D('User')->deleteById($id);
			if($ret){
				return show(1,'删除成功');
			}else{
				return show(0,'删除失败');
			}
		}else{
			return show(0,'已被预约，无法删除');
		}
	}

	public function order(){
		//$type=$_SESSION['adminUser']['type'];
		$this->assign('type',$this->type);
		$element = $_SESSION['searchcontent'];
		$ret = D('User')->searchByName($element);
		//$username=$_SESSION['adminUser']['username'];
		$this->assign('searchname',$element);
		$this->assign('order',$ret);
		$this->assign('uname',$this->username);
		$this->display();
	}

	public function search(){
		$element = $_POST['element'];
		session('searchcontent',$element);
		return show(1,$_SESSION['searchcontent']);
	}

	public function appointment(){
		$id = $_POST['id'];
		$ret = D('User')->getStatus($id);
		$ret2 = D('User')->getTime($id);
		$nowtime = strtotime(date('y-m-d h:i:s',time()));
		$etime = strtotime($ret2);
		if($nowtime>=$etime){
			return show(0,'已过期');
		}

		//$username = $_SESSION['adminUser']['username'];
		$data['username']=$this->username;
		$data['uid']=$id;
		if($ret==0){
			show(0,"已被预约");
		}else{
			$ret1 = D('User')->changeStatus($id);
			$ret2 = D('User')->insertToOrder($data);
			if($ret1 && $ret2){
				return show(1,'预约成功');
			}else{
				return show(0,'预约失败');
			}
		}
	}

	public function change(){
		//$type=$_SESSION['adminUser']['type'];
		$this->assign('type',$this->type);
		//$element = $_SESSION['searchcontent'];
		//$username=$_SESSION['adminUser']['username'];
		$ret = D('User')->searchByUsername($this->username);
		//echo $ret;
		//$this->assign('searchname',$element);
		$this->assign('change',$ret);
		$this->assign('uname',$this->username);
		$this->display();
	}

	public function cancel(){
		$id = $_POST['id'];
		M()->startTrans();
		$uid = D('User')->getUidById($id);
		$ret = D('User')->deleteById3($id);
		$ret2= D('User')->changeStatusByUid($uid);
		if($uid && $ret && $ret2){
			M()->commit();
			return show(1,"取消成功");
		}else{
			M()->rollback();
			return show(0,"取消失败");
		}

	}

	public function person(){
		//$username=$_SESSION['adminUser']['username'];
		$this->assign('uname',$this->username);
		$data = D('User')->getInformation($this->username);
		$this->assign('user',$data);
		$this->display();
	}

	public function changeInfo(){
		//$username=$_SESSION['adminUser']['username'];
		$this->assign('uname',$this->username);
		$data = D('User')->getInformation($this->username);
		$this->assign('user',$data);
		$this->display();
	}

	public function saveInfo(){
		if(!isset($_POST['username']) || !$_POST['username']){
            return show(0,'用户名不可为空');
        }
        if(strlen($_POST['username'])>16){
            return show(0,'用户名过长');
        }
        if(!isset($_POST['name']) || !$_POST['name']){
            return show(0,'姓名不可为空');
        }
        if(!isset($_POST['sid']) || !$_POST['sid']){
            return show(0,'学号不可为空');
        }
        if(!isset($_POST['phone']) || !$_POST['phone']){
            return show(0,'电话不可为空');
        }
        $status1 = D('Admin')->isexistByUsername($_POST['username']);
        $status2 = D('Admin')->isexistBySid($_POST['sid']);
        $ssid = D('User')->getSidByUsername($this->username);
        if($status1 && $_POST['username']!=$this->username ) {
            return show(0,'用户名已存在');
        }
        if($status2 && $_POST['sid']!=$ssid) {
            return show(0,'该学号/教工号已存在');
        }
        M()->startTrans();
        $ret2 = D('Admin')->saveInfo($this->username,$_POST);
        $ret = D('User')->saveInfor($this->username,$_POST);
        if($ret && $ret2 ){
        	$_SESSION['adminUser']['username']=$_POST['username'];
        	$_SESSION['adminUser']['type']=$_POST['type'];
        	M()->commit();
        	return show(1,'保存成功');

        }
        else{
        	M()->rollback();
        	return show(0,'保存失败');
        }

	}

	public function changePassw(){
		$this->assign('uname',$this->username);
		$this->display();
	}

	public function savePassw(){
		if(!isset($_POST['password']) || !$_POST['password']){
            return show(0,'请输入密码');
        }if(!isset($_POST['npassword']) || !$_POST['npassword']){
            return show(0,'请确认新密码');
        }
        if(strlen($_POST['npassword'])>16 || strlen($_POST['npassword'])<6){
            return show(0,'请控制密码长度大于6位，小于16位');
        }
		if(!isset($_POST['enternpassword']) || !$_POST['enternpassword']){
            return show(0,'请确认密码');
        }
        $opassw = D('Admin')->getPassw($this->username);
        if(md5($_POST['password'] . C('MD5_PRE')) != $opassw){
        	return show(0,'密码错误');
        }
        if($_POST['npassword'] != $_POST['enternpassword']){
        	return show(0,'确认密码错误');
        }

        $ret = D('Admin')->savePass($this->username,md5($_POST['npassword'] . C('MD5_PRE')));
        if($ret){
        	session('adminUser', null);
        	session('searchcontent',null);
			return show(1,'修改成功');
        }else{
        	return show(0,'修改失败');
        }
        
	}

	public function watch(){
		$this->assign('uname',$this->username);
		$ret = D('User')->getOrderInfo($this->username);
		$this->assign('users',$ret);
		$this->display();
	}
}

?>