<?php

session_start();

include('function.php');
$object=new task_site();

if(strcmp($_POST['formname'],"signin")==0)
{
	$uname=$_POST['username'];
	$pword=$_POST['password'];

	echo $uname;
	echo $pword;
	$result=$object->signin_webmail($uname,$pword);

	if($result==TRUE)
	{
		echo "TRUE";
		$res=$object->signin($uname);
		if($res)
		{	
			$string="Location:profile_edit.php";
    		header($string);
    	}
    	else
    	{
    		header('Location:profile_signin.php?error=signinfail');		
    	}
	}
	else
	{
		echo "FALSE";
		header('Location:profile_signin.php?error=signinfail');
	}
}

if(strcmp($_POST['formname'],"taskedit")==0)
{
	
	$task_name=$_POST['task_name'];
	$task_desc=$_POST['task_desc'];
	$task_status=$_POST['status'];
	$task_id=$_POST['task_id'];

	$object->edit_task($task_id,$task_name,$task_desc,$task_status);
	
}

if(strcmp($_POST['formname'],"taskadd")==0)
{
	
	$task_name=$_POST['task_name'];
	$task_desc=$_POST['task_desc'];
	$task_status=$_POST['status'];

	echo $_SESSION['id'];
	if(isset($_SESSION['id']))
	$object->add_task($_SESSION['id'],$task_name,$task_desc,$task_status);
	
}

if(strcmp($_POST['formname'],"logout")==0)
{	
	session_unset();
	session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

    $string="Location:index.php";
    header($string);
}

?>