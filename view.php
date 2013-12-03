<?php

session_start();

$connect = mysql_connect("sql.njit.edu","njr7","QEXNEA1E") or die("Could not connect to database.");
mysql_select_db("njr7") or die("Could not find database.");

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
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="flow-info">
								<fieldset>
									<?php									
							
									$query = mysql_query("SELECT * FROM CASS");
									$numrows = mysql_num_rows($query);	
									?>
									
									<select id="view_assignment" name="view_assignment">	
										<option value=""></option>
										<?php
										for($i=0; $i<$numrows; $i++)
										{
											$row = mysql_fetch_assoc($query);
											$assignment_xml = $row['assignment_xml'];
											$assignment = new SimpleXMLElement($assignment_xml);	
											echo "<option value=" . $row['ID'] . ">" . $assignment->name[0] . "</option>";

										}	
										?>
									</select>
									<br>
									<input type="submit" name="submit3" value="Submit" class="dark" />
									
									<?php
									$view_assignment = $_POST['view_assignment'];
									$query = mysql_query("SELECT * FROM CASS WHERE ID='$view_assignment'");
									$row = mysql_fetch_assoc($query);
									$assignment_xml = $row['assignment_xml'];
									$assignment = new SimpleXMLElement($assignment_xml);	
	

									?> <br><br><b><u> <?php echo "Assignment Parameters"; ?> </u></b><br> <?php
									?> <b> <?php echo "Assignment Name: "; ?> </b> <?php
									echo $assignment->name[0]; ?> <br> <?php
									?> <b> <?php echo "Assignment Description: "; ?> </b> <?php
									echo $assignment->description[0]; ?> <br> <?php
									?> <b> <?php echo "Number of Questions: "; ?> </b> <?php
									echo $assignment->num_questions[0]; ?> <br> <?php
									?> <b> <?php echo "Group Size: "; ?> </b> <?php
									echo $assignment->group_size[0]; ?> <br><br> <?php	
									
									for($i=0; $i<$assignment->num_questions[0]; $i++)
									{
										?><br><b><?php echo "Question #" . ($i+1); ?></b><br> <?php


										?> <b><u> <?php echo "Create Problem Parameters "; ?> </u></b><br> <?php
										?> <b> <?php echo "Question Type: "; ?> </b> <?php									
										echo $assignment->workflow->createparams->question_type[$i]; ?> <br> <?php
										?> <b> <?php echo "Task Instructions: "; ?> </b> <?php
										echo $assignment->workflow->createparams->instructions[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Days: "; ?> </b> <?php
										echo $assignment->workflow->createparams->duration_days[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Hours: "; ?> </b> <?php
										echo $assignment->workflow->createparams->duration_hours[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Minutes: "; ?> </b> <?php
										echo $assignment->workflow->createparams->duration_minutes[$i]; ?> <br> <?php
										?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
										echo $assignment->workflow->createparams->graded[$i]; ?> <br> <?php
										?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
										echo $assignment->workflow->createparams->if_late[$i]; ?> <br> <?php
										?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
										echo $assignment->workflow->createparams->task_assignee[$i]; ?> <br><br> <?php

										?> <b><u> <?php echo "Edit Problem Parameters "; ?> </u></b><br> <?php
										?> <b> <?php echo "Duration Days: "; ?> </b> <?php
										echo $assignment->workflow->editparams->duration_days[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Hours: "; ?> </b> <?php
										echo $assignment->workflow->editparams->duration_hours[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Minutes: "; ?> </b> <?php
										echo $assignment->workflow->editparams->duration_minutes[$i]; ?> <br> <?php
										?> <b> <?php echo "Does this task loop back to create problem until approved? "; ?> </b> <?php
										echo $assignment->workflow->editparams->loop[$i]; ?> <br> <?php
										?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
										echo $assignment->workflow->editparams->graded[$i]; ?> <br> <?php
										?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
										echo $assignment->workflow->editparams->if_late[$i]; ?> <br> <?php
										?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
										echo $assignment->workflow->editparams->task_assignee[$i]; ?> <br><br> <?php

										?> <b><u> <?php echo "Solve Problem Parameters "; ?> </u></b><br> <?php
										?> <b> <?php echo "Duration Days: "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->duration_days[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Hours: "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->duration_hours[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Minutes: "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->duration_minutes[$i]; ?> <br> <?php
										?> <b> <?php echo "Does this task get graded? "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->graded[$i]; ?> <br> <?php
										?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->if_late[$i]; ?> <br> <?php
										?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
										echo $assignment->workflow->solutionparams->task_assignee[$i]; ?> <br><br> <?php			

										?> <b><u> <?php echo "Grading Parameters "; ?> </u></b><br> <?php
										?> <b> <?php echo "Duration Days: "; ?> </b> <?php
										echo $assignment->workflow->gradingparams->duration_days[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Hours: "; ?> </b> <?php
										echo $assignment->workflow->gradingparams->duration_hours[$i]; ?> <br> <?php
										?> <b> <?php echo "Duration Minutes: "; ?> </b> <?php
										echo $assignment->workflow->gradingparams->duration_minutes[$i]; ?> <br> <?php
										?> <b> <?php echo "What happens if users do not complete task on time? "; ?> </b> <?php
										echo $assignment->workflow->gradingparams->if_late[$i]; ?> <br> <?php
										?> <b> <?php echo "Who is assigned this task? "; ?> </b> <?php
										echo $assignment->workflow->gradingparams->task_assignee[$i]; ?> <br><br> <?php	
									}

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