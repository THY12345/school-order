<?php
namespace Admin\Controller;
use Think\Controller;

/**
* 
*/
class loginController extends Controller
{
	
	public function index(){
        // if(session('adminUser')) {
        //    $this->redirect('/index.php?m=admin&c=login&a=index');
        // }
        // admin.php?c=index
        $this->display();
    }

	public function check(){

		$username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        else if(!trim($password)) {
            return show(0,'密码不能为空');
        }

        $ret = D('Admin')->getAdminByUsername($username);
        if(!$ret) {
            return show(0,'该用户不存在');
        }

        if($ret['password'] != md5($password . C('MD5_PRE'))) {
            return show(0,'密码错误');
        }
        //$ret2 = D('Admin')->getType($username);
        $ret['type'] = D('Admin')->getType($username);
        session('adminUser', $ret);

        if($ret['type']=='0'){
            return show(1,'0');
        }else{
            return show(1,'1');
        }
        
	}

    public function loginout() {
        session('adminUser', null);
        session('searchcontent',null);
        $this->redirect('/index.php?m=admin&c=login&a=index');
    }

    public function signin() {
        $this->display();
    }

    public function signincheck() {
        if(!isset($_POST['username']) || !$_POST['username']){
            return show(0,'用户名不可为空');
        }
        if(strlen($_POST['username'])>16){
            return show(0,'用户名过长');
        }
        if(!isset($_POST['password']) || !$_POST['password']){
            return show(0,'密码不可为空');
        }
        if(strlen($_POST['password'])>16 || strlen($_POST['password'])<6){
            return show(0,'请控制密码长度大于6位，小于16位');
        }
        if(!isset($_POST['enterpassword']) || !$_POST['enterpassword']){
            return show(0,'请确认密码');
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
        if($_POST['enterpassword']!=$_POST['password']){
            return show(0,'密码确认错误');
        }
        //去重
        $status1 = D('Admin')->isexistByUsername($_POST['username']);
        $status2 = D('Admin')->isexistBySid($_POST['sid']);
        if($status1) {
            return show(0,'用户名已存在');
        }
        if($status2) {
            return show(0,'该学号/教工号已被注册');
        }
        $md5pass = md5($_POST['password'] . C('MD5_PRE'));
        $data = array(
            'username' => $_POST['username'],
            // 'password' => $_POST['password'],
            'name' => $_POST['name'],
            'type' => $_POST['type'],
            'sid' => $_POST['sid'],
            'phone' => $_POST['phone'],
            // 'username' => $_POST['username'],
         );
        $data2 = array(
            'username' => $_POST['username'],
            'password' => $md5pass,
         );
        M()->startTrans();
        $ret = D('Admin')->insertToName($data);
        $ret2 = D('Admin')->insertToUser($data2);
        if($ret && $ret2){
            M()->commit();
            return show(1,'注册成功');
        }else{
            M()->rollback();
            return show(0,'注册失败');
        }
    }

}



?>