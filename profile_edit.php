<html>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	$string="Location:profile_signin.php";
    header($string);
}
?>
<title>Task_</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-1.11.0.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
		</script>
<!-- //end-smoth-scrolling -->
		<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>

		<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

<head>
	
</head>

<body>

<!--logo start-->
    <div class="header">
		   <div class="logo">
				<h1><a href="#">Task_</a></h1>
				<div class="sign_in"><form action='routing.php' method="post"><p><input name="formname" value='logout' hidden/><input type='submit' class='my-button' value='Logout'/><p></form></div>
		   </div>

		   <div class="header-main">
		   		<?php
		   			include('function.php');
		   			$object=new task_site();
		   			if(isset($_SESSION['id']))
		   			$object->list_tasks_options($_SESSION['id']);
		   		?>

		   	<div class='col-md-5 header-left'>	
		   	<div class="fle-e">
				<div class="fl-lft">
				</div> 
				<div class='fle-rgt'>
				<form action='routing.php' method='post'>
							<p>Add New Task</p>
							<input value='taskadd' name='formname' hidden/>
							<p>Task/Project Name : </p>
							<input type="text" name='task_name'/><br>
							<p>Task/Project Description (300 char max) : </p>
							<input type="text" name='task_desc'/><br>
							<p>Task/Project Status, Estimated date of completion : </p>
							<input type="text" name='status'/><br><br>
							<input type='submit' class='my-button' value='Save'>
						</form>
					<div class="clearfix"></div>
			</div>
			</div>

	</div>	

	
</body>
</html>