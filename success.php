<?php

session_start();

/*
$cq = $_SESSION['current_question'];
$ct = $_SESSION['current_task'];
$noq = $_SESSION['current_task'];
$assignment_xml = $_SESSION['number_of_questions'];

session_destroy();

$_SESSION['current_question'] = $cq;
$_SESSION['current_task'] = $ct;
$_SESSION['assignment_xml'] = $assignment_xml;
$_SESSION['number_of_questions'] = $noq;
*/

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>CASS Editor</title>   
		<link rel="stylesheet" href="css/style3.css">
	</head>
	
	<body>
		<!-- Top Bar -->
		<div id="top-bar">
			<div class="page-full-width cf">
				<ul id="nav" class="fl">
				<li class="v-sep"><a href="http://web.njit.edu/~njr7/ce/index.php" class="button dark">Home</a></li>
				</strong></a></li>
				</ul>		
			</div> 	
		</div> 

		<!-- Header -->
		<div id="header">
			<div class="page-full-width cf">	
				<div id="login-intro" class="fl">			
					<h1>CASS Editor</h1>			
				</div> 			
			</div> 
		</div> 
		
		<!-- Main Content -->
		<div id="content">		
			<div class="page-full-width cf">
				<div class="side-menu fl">				
					<h3>Side Menu</h3>
					<ul>
						<li><a href="http://web.njit.edu/~njr7/ce/create.php">Create New Assignment</a></li>
						<li><a href="http://web.njit.edu/~njr7/ce/import.php">Import Assignment</a></li>
						<li><a href="http://web.njit.edu/~njr7/ce/view.php">View Assignment</a></li>
					</ul>				
				</div>	
				<div class="side-content fr">							
					<div class="content-module">				
						<div class="content-module-heading cf">					
							<h3 class="fl">HOME</h3>					
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
								<fieldset>
									<h1><b>Question #<?php echo ($_SESSION['current_question'] - 1); ?> has been successfully created!</b></h1>
									<br><br>
									<?php
									if($_SESSION['current_question'] <= $_SESSION['number_of_questions'])
									{
									?>
										<h1><b>Proceed to create question #<?php echo ($_SESSION['current_question']); ?>.</b></h1>
									<?php
									}
									?>
									
									<a href="http://web.njit.edu/~njr7/ce/form1.php" class="dark button">Continue</a>
								</fieldset>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</body>
</html>