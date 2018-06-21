<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller 
{
    public function _empty($name){     
        $this -> display("login");
    }

    public function _initialize(){
        if(isset($_SESSION["userdata"])){
            //若没有登录就跳转到登录页面
            $uid = $_SESSION['userdata']['uid'];
            $user = D('portal_media_users');
            $status = $user -> where("uid = $uid") -> getField('status');
            if($status == 0){
                header("Location:".U("Home/Register/chooseType"));exit;
            }elseif ($status == 1) {
                header("Location:".U("Home/Register/info"));exit;
            }
            header("Location:".U("Home/Admin/index"));exit;
            
        }
    }
    //显示登录页面
	public function login()
    {
        $this->display();
    }

    //进行登录操作
    public function dologin()
    {
        $mediaUser = D('portal_media_users');
        $post = I('post.');
        $map["username"] = ["eq", $post["username"]]; 

        $data = $mediaUser->where($map)->find();

        if(!$data){
            $return['status'] = '0';
            $return['data'] = '';
            $return['msg'] = '用户不存在';
            $this->ajaxReturn($return);
        }

        if(!password_verify($post['password'], $data['password'])){
            $return['status'] = '2';
            $return['data'] = '';
            $return['msg'] = '密码错误！';
            $this->ajaxReturn($return);
        }
        
        $_SESSION["userdata"] = $data;

        $return['status'] = '1';
        $return['data'] = '';
        $return['msg'] = '登录成功';
        $this->ajaxReturn($return);
    } 

    public function logout()
    {

    	//注销SESSION
        $_SESSION["userdata"] = null;

        $this->redirect("Home/Login/login", 0);

    }

}