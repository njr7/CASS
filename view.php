<?php

session_start();

if($_SESSION['assignment_xml'])
{
	$assignment_xml = $_SESSION['assignment_xml'];
	$assignment = new SimpleXMLElement($assignment_xml);
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
							<h3 class="fl">VIEW ASSIGNMENT</h3>					
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
								<fieldset>
									<?php 
									$connect = mysql_connect("sql.njit.edu","njr7","QEXNEA1E") or die("Could not connect to database.");
									mysql_select_db("njr7") or die("Could not find database.");
									
									$query = mysql_query("SELECT * FROM CASS");
									$numrows = mysql_num_rows($query);	
									$row = mysql_fetch_assoc($query);
									$assignment_xml = $row['assignment_xml'];
									$assignment = new SimpleXMLElement($assignment_xml);	

									?> <b><u> <?php echo "ASSIGNMENT PARAMETERS"; ?> </u></b><br> <?php
									?> <b> <?php echo "ASSIGNMENT NAME: "; ?> </b> <?php
									echo $assignment->name[0]; ?> <br> <?php
									?> <b> <?php echo "ASSIGNMENT DESCRIPTION: "; ?> </b> <?php
									echo $assignment->description[0]; ?> <br> <?php
									?> <b> <?php echo "NUMBER OF QUESTIONS: "; ?> </b> <?php
									echo $assignment->num_questions[0]; ?> <br> <?php
									?> <b> <?php echo "GROUP SIZE: "; ?> </b> <?php
									echo $assignment->group_size[0]; ?> <br><br> <?php

									?> <b><u> <?php echo "CREATE PROBLEM PARAMETERS "; ?> </u></b><br> <?php
									?> <b> <?php echo "QUESTION TYPE: "; ?> </b> <?php									
									echo $assignment->workflow->createparams->question_type[0]; ?> <br> <?php
									?> <b> <?php echo "TASK INSTRUCTIONS: "; ?> </b> <?php
									echo $assignment->workflow->createparams->instructions[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION DAYS: "; ?> </b> <?php
									echo $assignment->workflow->createparams->duration_days[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION HOURS: "; ?> </b> <?php
									echo $assignment->workflow->createparams->duration_hours[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION MINUTES: "; ?> </b> <?php
									echo $assignment->workflow->createparams->duration_minutes[0]; ?> <br> <?php
									?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
									echo $assignment->workflow->createparams->graded[0]; ?> <br> <?php
									?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
									echo $assignment->workflow->createparams->if_late[0]; ?> <br> <?php
									?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
									echo $assignment->workflow->createparams->task_assignee[0]; ?> <br><br> <?php

									?> <b><u> <?php echo "EDIT PARAMETERS "; ?> </u></b><br> <?php
									?> <b> <?php echo "DURATION DAYS: "; ?> </b> <?php
									echo $assignment->workflow->editparams->duration_days[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION HOURS: "; ?> </b> <?php
									echo $assignment->workflow->editparams->duration_hours[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION MINUTES: "; ?> </b> <?php
									echo $assignment->workflow->editparams->duration_minutes[0]; ?> <br> <?php
									?> <b> <?php echo "Does this task loop back to create problem until approved? "; ?> </b> <?php
									echo $assignment->workflow->editparams->loop[0]; ?> <br> <?php
									?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
									echo $assignment->workflow->editparams->graded[0]; ?> <br> <?php
									?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
									echo $assignment->workflow->editparams->if_late[0]; ?> <br> <?php
									?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
									echo $assignment->workflow->editparams->task_assignee[0]; ?> <br><br> <?php

									?> <b><u> <?php echo "SOLUTION PARAMETERS "; ?> </u></b><br> <?php
									?> <b> <?php echo "DURATION DAYS: "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->duration_days[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION HOURS: "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->duration_hours[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION MINUTES: "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->duration_minutes[0]; ?> <br> <?php
									?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->graded[0]; ?> <br> <?php
									?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->if_late[0]; ?> <br> <?php
									?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
									echo $assignment->workflow->solutionparams->task_assignee[0]; ?> <br><br> <?php			

									?> <b><u> <?php echo "GRADING PARAMETERS "; ?> </u></b><br> <?php
									?> <b> <?php echo "DURATION DAYS: "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->duration_days[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION HOURS: "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->duration_hours[0]; ?> <br> <?php
									?> <b> <?php echo "DURATION MINUTES: "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->duration_minutes[0]; ?> <br> <?php
									?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->graded[0]; ?> <br> <?php
									?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->if_late[0]; ?> <br> <?php
									?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
									echo $assignment->workflow->gradingparams->task_assignee[0]; ?> <br><br> <?php										
									
									?>
								</fieldset>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</body>
</html>