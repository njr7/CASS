<?php

session_start();

$_SESSION['current_question'] = 1;
$_SESSION['current_task'] = 0;

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
							<h3 class="fl">CREATE NEW ASSIGNMENT</h3>			
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<form action="http://web.njit.edu/~njr7/ce/form1.php" method="post" id="flow-info">
								<fieldset>
									<p>
										<label for="assignment_name">Assignment Name:</label>
										<input type="text" name="assignment_name" id="assignment_name" class="round full-width-input"/>
										<em>Enter the title of this assignment.</em>	
									</p>	
									<br><br>
									<p>
										<label for="assignment_description">Assignment Description:</label>
										<textarea name="assignment_description" rows="4" cols="50"></textarea>
										<em>Enter a description for this assignment. (Optional)</em>	
									</p>										
									<br><br>
									<p>
										<label for="number_of_questions">Number of Questions:</label>
										<input type="text" size="2" name="number_of_questions" id="number_of_questions" />
										<em>Enter the total number of questions that this assignment will contain.</em>	
									</p>									
									<br><br>									
									<p>
										<label for="group_size">Group Size:</label>
										<input type="text" size="2" name="group_size" id="group_size" />
										<em>Enter how many students there will be per group (Enter 1 for no groups).</em>
									</p>									
									
									<p>									
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/index.php" class="dark button">Save and cancel</a>
										&nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/restart.php" class="dark button">Cancel without saving</a>											
									</p>															
								</fieldset>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</body>	
</html>