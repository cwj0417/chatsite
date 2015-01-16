<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }
    public function addgoods(){
    	$this->display();
    }
    public function addgoodsaction(){
    	$m=M('goods');
    	$m->create();
    	$res=$m->add();
    	echo $res;
    }
}