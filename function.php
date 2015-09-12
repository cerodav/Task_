<?php



class task_site
{
	function connection()
	{
		include('constants.php');
		try {
    	$dbh = new PDO('mysql:host=localhost;dbname='.$db_name, $username, $password);
		} catch (PDOException $e) {
    	print "Error!: " . $e->getMessage() . "<br/>";
    	die();
		}
		return $dbh;
	}

	function signin($uname)
	{
		//$pword=sha1($pword);

		$dbh=$this->connection();
		// Checking whether the requested username exist
		$statement=$dbh->prepare("SELECT * FROM users_ WHERE webmail='$uname'");
		$statement->execute();
		$results=$statement->fetchAll();

		if($statement->rowCount()==1)
		{
			session_start();
			$_SESSION['id']=$results[0]['id'];
			return TRUE;
		} 
		else
			return FALSE;
	}

	function add_task($user_id,$task_name,$task_desc,$status)
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("INSERT INTO tasks_ (user_id,task_name,task_desc,status) VALUES (?,?,?,?)");
		$stmt->bindParam(1, $user_id);
		$stmt->bindParam(2, $task_name);
		$stmt->bindParam(3, $task_desc);
		$stmt->bindParam(4, $status);
		$stmt->execute();
	}

	function edit_task($task_id,$task_name,$task_desc,$status)
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("UPDATE tasks_ SET task_name=?,status=?,task_desc=? WHERE task_id=?");
		$stmt->bindParam(1, $task_name);
		$stmt->bindParam(2, $status);
		$stmt->bindParam(3, $task_desc);
		$stmt->bindParam(4, $task_id);
		$stmt->execute();
		
		$string="Location:profile_edit.php";
		header($string);	
	}

	function list_users()
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("SELECT * FROM users_");
		$stmt->execute();
		$results=$stmt->fetchAll();

		$rows=$stmt->rowCount();
		$n=ceil($rows/4);
		$l=0;
		$over=0;
		for($i=0;$i<4;$i++)
		{
			echo "<div class='col-md-3 header-left'>";
			for($j=0;$j<$n;$j++)
			{
				if($l<$rows)
				{
					$result=$results[$l];
					echo "	<a style='text-decoration:none' href='profile.php?id=".$result['id']."'>
			   			<div class='socialspan_3'>
							    <img class='img-responsive' src='https://graph.facebook.com/".$result['fb_id']."/picture?type=large' alt=''>
								<h3>".$result['name']."</h3>
								<input name='id' value='".$result['webmail']."' hidden/>
								<p>Webmail : ".$result['webmail']."</p>
								<p>Mobile No. : ".$result['mobile']."</p>
								<div class='soci'>
									<li><a href='https://www.facebook.com/".$result['facebook']."'><i class='fb-1'></i></a></li>
									<li><a href='https://github.com/".$result['github']."'><i class='twt-1'></i></a></li>
								</div>
						</div>
						</a>";
					$l++;
			   	}
			   	else
			   	{
			   		$over=1;
			   	}

			}		
			echo "</div>";
			if($over==1)
				break;
		}

	}

	function list_tasks($user_id)
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("SELECT * FROM tasks_ WHERE user_id=?");
		$stmt->bindParam(1, $user_id);
		$stmt->execute();
		$results=$stmt->fetchAll();
		
		$rows=$stmt->rowCount();
		$n=ceil($rows/2);
		$l=0;
		$over=0;
		for($i=0;$i<4;$i++)
		{
			echo "<div class='col-md-5 header-left'>";
			for($j=0;$j<$n;$j++)
			{
				if($l<$rows)
				{
					$result=$results[$l];
					echo "<div class='fle-e'>
						<div class='fl-lft'>
						</div> 
						<div class='fle-rgt'>
							<h4>".$result['task_name']."</h4>
							<h6>".$result['task_desc']."</h6>
							<p>".$result['status']."</p>
						</div>
							<div class='clearfix'></div>
					</div>";
					$l++;
				}
				else
			   	{
			   		$over=1;
			   	}

			}		
			echo "</div>";
			if($over==1)
				break;
		}

				
		

	}

	function signin_webmail($username,$password)
	{
		$imap_server_address="webmail.nitt.edu";
		$imap_port=143;

		$imap_stream = fsockopen($imap_server_address,$imap_port);	 

		if ( !$imap_stream ) 
		{	 
			return false;	 
		}

		$server_info = fgets ($imap_stream, 1024);	 
		$query = 'b221 ' . 'LOGIN "' . $username . '" "' .$password . "\"\r\n";	 
		$read = fputs ($imap_stream, $query);	 
		$response = fgets ($imap_stream, 1024);	 
		
		//For logout operation
		//$query = 'b222 ' . 'LOGOUT';	 
		//$read = fputs ($imap_stream, $query);	 
		fclose($imap_stream);
		strtok($response, " ");	 

		$result = strtok(" ");	 
		if($result == "OK")			
			return TRUE;	 
		else	 
			return FALSE;
	}

	function logout_webmail()
	{
		$imap_server_address="webmail.nitt.edu";
		$imap_port=143;
		
		$imap_stream = fsockopen($imap_server_address,$imap_port);	 

		if ( !$imap_stream ) 
		{	 
			echo "IMAP ERROR";
			return FALSE;
		}
		
		
			$server_info = fgets ($imap_stream, 1024);	 
			//$query = 'b221 ' . 'LOGIN "' . $username . '" "' .$password . "\"\r\n";	 
			//$read = fputs ($imap_stream, $query);	 
			
			$query = 'b222 ' . 'LOGOUT';	 
			$read = fputs ($imap_stream, $query);	 
			$response = fgets ($imap_stream, 1024);	 
			fclose($imap_stream);
			strtok($response, " ");	 
			$result = strtok(" ");	 
			if($result == "OK")			
				return TRUE;
			else	 
				return FALSE;
	}

	function list_tasks_options($user_id)
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("SELECT * FROM tasks_ WHERE user_id=?");
		$stmt->bindParam(1, $user_id);
		$stmt->execute();
		$results=$stmt->fetchAll();

		$rows=$stmt->rowCount();
		$n=ceil($rows/2);
		$l=0;
		$over=0;
		for($i=0;$i<4;$i++)
		{
			echo "<div class='col-md-5 header-left'>";
			for($j=0;$j<$n;$j++)
			{
				if($l<$rows)
				{
					$result=$results[$l];
					echo "<div class='fle-e'>
						<div class='fl-lft'>
						</div> 
						<div class='fle-rgt'>
						<form action='routing.php' method='post'>
							<input value='taskedit' name='formname' hidden/>
							<input value='".$result['task_id']."' name='task_id' hidden/>
							<p>Task/Project Name : </p>
							<input value='".$result['task_name']."' name='task_name'/><br>
							<p>Task/Project Description (300 char max) : </p>
							<input value='".$result['task_desc']."' name='task_desc'/><br>
							<p>Task/Project Status : </p>
							<input value='".$result['status']."' name='status'/><br><br>
							<input type='submit' class='my-button' value='Save'>
						</form>
						</div>
							<div class='clearfix'></div>
					</div>";
					$l++;
				}
				else
			   	{
			   		$over=1;
			   	}

			}		
			echo "</div>";
			if($over==1)
				break;
		}
				
		

	}

	function get_name($user_id)
	{
		$dbh=$this->connection();
		$stmt=$dbh->prepare("SELECT * FROM users_ WHERE id=?");
		$stmt->bindParam(1, $user_id);
		$stmt->execute();
		$results=$stmt->fetchAll();	
		if(!empty($results[0]))
		echo $results[0]['name'];
	}


}

?>