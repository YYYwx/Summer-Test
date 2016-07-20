<?php
	header("Content-Type:text/plain;charset=utf8");
	$staff=array(
		array("name"=>"于文轩","number"=>"101","sex"=>"男","job"=>"颜值担当"),
		array("name"=>"惠新宇","number"=>"102","sex"=>"女","job"=>"****"),
		array("name"=>"陈梦醒","number"=>"103","sex"=>"女","job"=>"****")
	);
	if($_SERVER["REQUEST_METHOD"] =="GET") {
		search();
	}
	elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
		create();
	}
	function search(){
		if(!isset($_GET["number"])||empty($_GET["number"])){
			echo "参数错误";
			return;
		}
		global $staff;
		$number=$_GET["number"];
		$result="没有找到";
		foreach ($staff as $value){
			if($value["number"]==$number){
				$result="姓名".$value["name"].",编号".$value["number"].",性别".$value["sex"]."，职位".$value["job"];
				break;
			}
		}
		echo $result;
	}
	function create(){
		//判断信息是否填写完全
		if(!isset($_POST["name"])||empty($_POST["name"])||!isset($_POST["number"])||empty($_POST["number"])||!isset($_POST["sex"])||empty($_POST["sex"])||
			!isset($_POST["job"])||empty($_POST["job"])){
			echo "信息输入不全";
		}
		else{
		echo $_POST["name"]."的信息保存成功";//视频里并没有保存到数据库/微笑。
	}
		
	}
  ?>