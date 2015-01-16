<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function liuyan(){
      $m=M('newfn');
      $res=$m->select();
      $this->assign('data',$res);
      $this->display();
    }
    public function ajax(){
      $this->display();
    }
    public function checkname(){
      $um=$_POST['username'];
      $m=M('user');
    echo $m->where("name='".$um."'")->count();
    }
    public function nickname(){
      $um=$_POST['username'];
      $m=M('user');
    echo $m->where("nickname='".$um."'")->count();
    }
   	public function reg(){
   		$m=M('user');
        $data['name']=$_POST['username'];
        $data['password']=md5($_POST['password']);
        $data['nickname']=$_POST['nickname'];
        //$data['gender']=$_POST['gender'];
        //$date['phone']=$_POST['phone'];
        //$data['email']=$_POST['email'];
        $data['time']=time();
        $res=$m->add($data);
        if($res==null){
            $this->error('注册失败');
        }else{
         $user=$m->where("id=".$res)->select();
          session('userinfo',$user[0]);
          echo "<script>parent.location.reload();</script>";
        }
   	}
   	public function log(){
   		$m=M('user');
        $res=$m->where("name='".$_POST['username']."' and password='".md5($_POST['pwd'])."'")->select();

     
        if($res==null){
            $this->error('账号或者密码错误了');
        }else{
            session('userinfo',$res[0]);
          
            echo "<script>parent.location.reload();</script>";
        }
   	}
    public function chartlog(){
      $m=M('user');
        $res=$m->where("name='".$_POST['username']."' and password='".md5($_POST['pwd'])."'")->select();

     
        if($res==null){
            $this->error('账号或者密码错误了');
        }else{
            session('userinfo',$res[0]);
            $this->success('开始聊天吧~');
         
        }
    }
   	public function logout(){
   		 session_destroy();
        $this->success('已安全登出');
   	}
    public function chart(){
      $this->display();
    }
    public function info(){
      $m=M('user');
      $id=$_SESSION['userinfo']['id'];
      $this->assign('data',$m->select($id)[0]);
      $this->display();
    }
    public function changetouxiang(){
      move_uploaded_file($_FILES['img']['tmp_name'], './touxiang/'.$_SESSION['userinfo']['id']);
      echo $_SESSION['userinfo']['id'];
    }
    public function qiandao(){
      $id=$_SESSION['userinfo']['id'];
      $lianxu=$_POST['lianxu'];
      $nd=$_POST['nd'];
      
      $today=date('Ymd',time());
      $yesterday=date('Ymd',time()-3600*24);
      if($nd==$today){echo 'did';exit;}//输出3：今天已经签到过了

      if($nd==$yesterday){
        $lianxu++;
      }else{
        $lianxu=1;
      }
        switch ($lianxu) {
          case '1':
            $jb=10;
            break;
          case '2':
            $jb=30;
            break;
          case '3':
            $jb=60;
            break;
          case '4':
            $jb=100;
            break;
          case '5':
            $jb=150;
            break;
          case '6':
            $jb=210;
            break;
          default:
            $jb=250;
            break;
        }//switch
       
        $m=M('user');
        $jbi=$m->select($id)[0]['jb'];
        $max=$m->select($id)[0]['maxqd'];
        if($lianxu>=$max){
          $data['maxqd']=$lianxu;
        }
        $jbi=$jbi+$jb;
        $data['jb']=$jbi;
        $data['lianxu']=$lianxu;
        $data['nd']=$today;
        $m->where("id='".$id."'")->save($data);
        echo $jb;
  }
  public function addfn(){
    $m=M('newfn');
    $data['title']=$_POST['title'];
    $data['describe']=$_POST['des'];
    $data['initiator']=$_POST['name'];
    $data['lastupdate']=time();
    $data['ding']=0;
    $res=$m->add($data);
    if($res===false){
     
      echo 'f';
    }else{
     
      echo 's';
    }
  }
  public function ding(){
    $tt=$_POST['tt'];//title
    $m=M('newfn');
    $cond['title']=$tt;
    $lud=$m->where($cond)->getField('lastupdate');
    $lastdate=date('Y-m-d',$lud);
    $today=date('Y-m-d');
    if ($lastdate!=$today) {//查出title的lastupdate(时间戳)是不是今天，不是的话：
      $ding=$m->where($cond)->getField('ding');
      $data['ding']=$ding+1;
      $data['lastupdate']=time();
      $data['ip']=$_SERVER['REMOTE_ADDR'];
     $m->where($cond)->save($data);
      echo 'dingle';
      //ding加一，lastupdate变成现在，ip变成当前ip
    }else{//时间是今天的话：检查ip里有没有当前ip，有的话返回已顶，没的话加上，ding加一，lastupdate改成现在
      $ips=$m->where($cond)->getField('ip');
      $tmp=explode(',', $ips);
      foreach ($tmp as $v) {
        if ($v==$_SERVER['REMOTE_ADDR']) {
         echo 'dingguo';exit;
        }
      }
      $tmp[]=$_SERVER['REMOTE_ADDR'];
      $data['ip']=implode(',', $tmp);
      $ding=$m->where($cond)->getField('ding');
      $data['ding']=$ding+1;
      $data['lastupdate']=time();
      $m->where($cond)->save($data);
        echo 'dingle';
    }

    
    
    
  }
}
?>