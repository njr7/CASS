<?php

session_start();

$_SESSION['current_task'] = $_SESSION['current_task'] + 1;

if($_SESSION['current_task'] == 1 && $_SESSION['current_question'] == 1)
{
	$_SESSION['assignment_name'] = $_POST['assignment_name'];
	$_SESSION['assignment_description'] = $_POST['assignment_description'];
	$_SESSION['number_of_questions'] = $_POST['number_of_questions'];
	$_SESSION['group_size'] = $_POST['group_size'];
}

if($_SESSION['assignment_xml'])
{
	$assignment_xml = $_SESSION['assignment_xml'];
	$assignment = new SimpleXMLElement($assignment_xml);
}

if($_SESSION['number_of_questions'])
{
	if($_SESSION['current_question'] > $_SESSION['number_of_questions'])
	{
		header('Location: http://web.njit.edu/~njr7/ce/backend.php');
	}
}

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
					<li class="v-sep"><a href="index.php" class="button dark">Home</a></li>
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
						<li><a href="create.php">Create New Assignment</a></li>
						<li><a href="import.php">Import Assignment</a></li>
						<li><a href="view.php">View Assignment</a></li>
					</ul>				
				</div>	
				<div class="side-content fr">							
					<div class="content-module">				
						<div class="content-module-heading cf">					
							<h3 class="fl">CREATING NEW ASSIGNMENT: <?php echo $_SESSION['assignment_name'] ?></h3>					
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<form action="form2.php" method="post" id="step-choice">
								<fieldset>	
								
									<p>																		
										<?php
										if($_SESSION['current_task'] == 1)
										{
										?>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="C" /> Create Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="E" disabled="disabled" /> Edit Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="S" disabled="disabled" /> Solve Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="G" disabled="disabled" /> Grading </label>
										<?php
										}
										?>

										<?php
										if($_SESSION['current_task'] == 2)
										{
										?>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="C" disabled="disabled"/> Create Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="E" /> Edit Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="S" disabled="disabled" /> Solve Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="G" disabled="disabled" /> Grading </label>
										<?php
										}
										?>
									
										<?php
										if($_SESSION['current_task'] == 3)
										{
										?>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="C" disabled="disabled" /> Create Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="E" disabled="disabled" /> Edit Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="S" /> Solve Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="G" disabled="disabled" /> Grading </label>
										<?php
										}
										?>
										
										<?php
										if($_SESSION['current_task'] == 4)
										{
										?>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="C" disabled="disabled" /> Create Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="E" disabled="disabled" /> Edit Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="S" disabled="disabled" /> Solve Problem </label>
										<label for="selected_task" class="alt-label"><input type="checkbox" name="selected_task" value="G" /> Grading </label>
										<?php
										}
										?>
										<em>Choose the next task in your assignment structure.</em>
									</p>
									
									<p>									
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="index.php" class="dark button">Save and cancel</a>
										&nbsp &nbsp
										<a href="restart.php" class="dark button">Cancel without saving</a>											
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