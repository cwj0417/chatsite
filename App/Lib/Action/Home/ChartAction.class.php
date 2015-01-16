<?php 
class ChartAction extends Action {

	public function index(){
		$m=M('user');
		$this->assign('userinfo',$m->where("id=".$_SESSION['userinfo']['id'])->select()[0]);
		$this->display();
	}
	public function fasong(){
		
		$m=M();
		$sql="insert into ".$_POST['number']." (nickname,content,time,size,color,bold) values('".$_POST['nickname']."','".$_POST['content']."','".date('Y-m-d,H:i:s')."','".$_POST['size']."','".$_POST['color']."','".$_POST['bold']."')";
		echo $sql;
		$m->query($sql);
	}
	public function fontsetting(){
		$m=M();
		$sql="update user set size='".$_POST['size']."',color='".$_POST['color']."',bold='".$_POST['bold']."' where id='".$_POST['id']."'";
		
		$m->query($sql);

	}
	public function getcontent(){
		$m=M($_POST['number']);
		$res=$m->order('id desc')->limit(10)->select();
		 echo json_encode($res);
	}
/*	public function lun(){
	       //set_time_limit(0);

        //}
        


        $lun=M($_POST['number']);
		$cr=$_POST['current'];
		
        while (1) {
                        $res=$lun->order('id asc')->where("id>".$cr)->limit(1)->select()[0];
            if($res!=null){
                echo json_encode($res);
                break;
            }
        }

		
	}*/
    public function charu(){
        $fh=fopen($_FILES['img']['tmp_name'], 'r');
        $imgdata=fread($fh, $_FILES['img']['size']);
      
        fclose($fh);

       // $file=fopen($_SERVER ['HTTP_HOST'].'/pic/haha.jpg','w');
        $fn="./pic/".time();
      	$file=fopen($fn, 'w');
       	
        fwrite($file, $imgdata);
        fclose($file);
        $route="<img src='../../pic/".$tm=time()."' />";
        //$route="<img src='../../pic/haha.jpg' />";
        echo str_replace("'", "\"", $route);
    }
    public function checkol(){
    	$nic=$_SESSION['userinfo']['nickname'];
        $id=$_SESSION['userinfo']['id'];
    	if(empty($nic)){exit;}
    	$m=M('ollist');
    	$res=$m->where("nickname='".$nic."'")->count();
    	if($res==0){
    		$data['nickname']=$nic;
            $data['id']=$id;
    		$data['time']=time();
    		$m->add($data);
    		
    	}else{
    		$c['nickname']=$nic;
    		$ud['time']=time();
    		$m->where($c)->save($ud);
    		
    	}
    }
    public function getollist(){
    	$m=M('ollist');
    	$time=time()-70;
        $m->where("time<'".$time."'")->delete();

    	$this->assign('data1',$m->select());
    	$this->assign('count1',$m->count());
    	$this->display();

    }
    public function leave(){
    	$m=M('ollist');
    	$name=$_SESSION['userinfo']['nickname'];
    	$c['nickname']=$name;
    	$m->where($c)->delete();

    }
    public function ltjl(){
        $User = M($_POST['number']); 
        $this->assign('data',$User->order('id desc')->select());
        $this->display();

    }
    public function ltjls(){
        $m=M($_POST['number']);
        $much=$_POST['much'];
        $res=$m->order('id desc')->limit($much)->select();
        $this->assign('data',$res);
        $this->display('ltjl');
    }
    public function room(){
        $m=M();
        $name=$_SESSION['userinfo']['nickname'];
        $c['nickname']=$name;
        $data=$_POST['room'];
        $sql="update ollist set room='".$data."' where nickname='".$name."'";
        $m->query($sql);
       
        
    }
    public function chatexp(){
        $m=M('user');
        $user=$_SESSION['userinfo']['id'];
        $exp=$m->select($user)[0]['exp']; 
        $exp++;                        
        $data['exp']=$exp;
      $m->where("id='".$user."'")->save($data); 
     
        $nic=$_SESSION['userinfo']['nickname'];
        if(empty($nic)){exit;}
        $m=M('ollist');
        $res=$m->where("nickname='".$nic."'")->count();
        if($res==0){
            $data['nickname']=$nic;
            $data['time']=time();
            $m->add($data);
            
        }else{
            $c['nickname']=$nic;
            $ud['time']=time();
            $m->where($c)->save($ud);
            
        }
    }
    public function getinfo(){
        $m=M('user');
        $user=$_SESSION['userinfo']['id'];
        $name=$m->select($user)[0]['nickname'];
        $exp=$m->select($user)[0]['exp'];
        $jb=$m->select($user)[0]['jb'];
        $this->assign('name',$name);
        $this->assign('exp',$exp);
        $this->assign('jb',$jb);
        $this->display();
    }

}
 ?>