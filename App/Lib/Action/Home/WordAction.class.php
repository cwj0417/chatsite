<?php 
class WordAction extends Action{
	public function index(){
		$dir=opendir('words');
		$m=M('libcreater');
		$counter=1;
		while ($ku=readdir($dir)) {
			if($ku=='.' || $ku=='..'){
				continue;
			}
			$dire[$counter]['name']=$ku;
			$tmp=$m->where("libname='".$ku."'")->getField('creater');
			$dire[$counter]['id']=$tmp;
			$counter++;
		}
		$this->assign('ku',$dire);
		
		$this->display();
	}
	public function createlib(){
		$id=$_SESSION['userinfo']['id'];
		if($id===null){echo '2';exit;}
		$dir=$_POST['ku'];
		$res=mkdir('./words/'.$dir);
		chmod('./words/'.$dir, 0777);
		echo($res);
		if($res===true){
			$m=M('libcreater');
			$data['libname']=$dir;
			$data['creater']=$id;
			$m->add($data);
		}
	}
	public function showlist(){
		$lib=$_GET['name'];
		$dir='words/'.$lib;
		$res=scandir($dir);
		foreach ($res as $v) {
			if ($v=='.'||$v=='..') {
				continue;
			}
			$tmp[]=$v;
		}
		$this->assign('lists',$tmp);
		$this->assign('libname',$dir);
		$this->display();
	}
	public function showlist2(){
		$lib=$_GET['name'];
		$dir='words/'.$lib;
		$res=scandir($dir);
		foreach ($res as $v) {
			if ($v=='.'||$v=='..') {
				continue;
			}
			$tmp[]=$v;
		}
		$this->assign('lists',$tmp);
		$this->assign('libname',$dir);
		$this->display();
	}
	public function dellib(){
		$lib=$_GET['name'];
		$res=rmdir('words/'.$lib);
		if($res===true){
			$this->success('删除成功');
		}else{
			$this->error('单词库不为空请手下留情');
		}
	}
	public function createlist(){
		$lib=$_POST['libname'].'/';
		$list=$_POST['listname'];
		$fh=fopen($lib.$list, 'w+');
		if($fh){
			echo '1';
			fclose($fh);
		}
	}
	public function dellist(){
		$name=$_GET['_URL_'][2];
		$lib=$_GET['_URL_'][4];
		$route='words/'.$lib.'/'.$name;
		$res=unlink($route);
		if ($res===true) {
			$this->success('删除成功');
		}else{
			$this->error('发生错误了请火速联系15001945465');
		}
	}
	public function showvoc(){
		$route=$_GET['_URL_'][4].'/'.$_GET['_URL_'][5].'/'.$_GET['_URL_'][3];
		$this->assign('route',$route);
		$fh=fopen($route, 'r');
		while (!feof($fh)) {
			$tp=fgets($fh);
			if($tp==''){continue;}
			$tmp[]=explode(',', $tp);
		}
		$this->assign('vocs',$tmp);
		$this->display();
	}
	public function showvoc2(){
		$route=$_GET['_URL_'][4].'/'.$_GET['_URL_'][5].'/'.$_GET['_URL_'][3];
		$this->assign('route',$route);
		$fh=fopen($route, 'r');
		while (!feof($fh)) {
			$tp=fgets($fh);
			if($tp==''){continue;}
			$tmp[]=explode(',', $tp);
		}
		$this->assign('vocs',$tmp);
		$this->display();
	}
	public function addvoc(){
		$route=$_POST['route'];
		$danci=$_POST['danci'];
		$jieshi=$_POST['jieshi'];
		$fh=fopen($route, 'a+');
		$res=fwrite($fh, $jieshi.','.$danci."\r\n");
		if($res!=false){
			echo 'ok';
		}
	}
}
 ?>