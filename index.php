<html>
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
		   </div>

		   <div class="header-main">
		   		<?php
		   			include('function.php');
		   			$object=new task_site();
		   			$object->list_users();
		   		?>
		   		

	</div>	

	
</body>
</html>