<?php

session_start();

if($_SESSION['assignment_xml'])
{
	$assignment_xml = $_SESSION['assignment_xml'];
	$assignment = new SimpleXMLElement($assignment_xml);
}

if($_POST['selected_task'] != NULL)
{
	$_SESSION['selected_task'] = $_POST['selected_task'];
}

//Default values
$_SESSION['C_duration_days'] = 0;
$_SESSION['C_duration_hours'] = 0;
$_SESSION['C_duration_minutes'] = 0;
$_SESSION['E_duration_days'] = 0;
$_SESSION['E_duration_hours'] = 0;
$_SESSION['E_duration_minutes'] = 0;
$_SESSION['S_duration_days'] = 0;
$_SESSION['S_duration_hours'] = 0;
$_SESSION['S_duration_minutes'] = 0;
$_SESSION['G_duration_days'] = 0;
$_SESSION['G_duration_hours'] = 0;
$_SESSION['G_duration_minutes'] = 0;

// Error handling and required field variables
$Error1 = $Error2 = $Error3 = $Error4 = $Error5 = "";
$C_instructions = $C_duration_days = $C_duration_hours = $C_duration_minutes ="";
$E_duration_days = $E_duration_hours = $E_duration_minutes ="";
$S_duration_days = $S_duration_hours = $S_duration_minutes ="";
$G_duration_days = $G_duration_hours = $G_duration_minutes ="";

if ($_POST['submit2'])
{
	if ($_POST["C_instructions"] == "")
    {
		$Error1 = "Instructions are required";
	}
	else
    {
		$C_instructions = test_input($_POST["C_instructions"]);
		$_SESSION['C_instructions'] = $_POST['C_instructions'];
	}	
	
	if ($_POST["C_duration_days"] == "" || $_POST["C_duration_hours"] == "" || $_POST["C_duration_minutes"] == "")
    {
		$Error2 = "Each duration field is required";
	}
	else if (!is_numeric($_POST["C_duration_days"]) || !is_numeric($_POST["C_duration_hours"]) || !is_numeric($_POST["C_duration_minutes"]))
    {
		$Error2 = "Duration fields must contain an integer";
	}
	else if($_POST["C_duration_days"] + $_POST["C_duration_hours"] + $_POST["C_duration_minutes"] <= 0)
	{
		$Error2 = "Duration must be a length of time greater than 0";
	}
	else
    {
		$C_duration_days = test_input($_POST["C_duration_days"]);
		$C_duration_hours = test_input($_POST["C_duration_hours"]);
		$C_duration_minutes = test_input($_POST["C_duration_minutes"]);
		
		$_SESSION['C_duration_days'] = $_POST['C_duration_days'];
		$_SESSION['C_duration_hours'] = $_POST['C_duration_hours'];
		$_SESSION['C_duration_minutes'] = $_POST['C_duration_minutes'];
	}
		
	if ($_POST["E_duration_days"] == "" || $_POST["E_duration_hours"] == "" || $_POST["E_duration_minutes"] == "")
    {
		$Error3 = "At least one duration field is required";
	}
	else if (!is_numeric($_POST["E_duration_days"]) || !is_numeric($_POST["E_duration_hours"]) || !is_numeric($_POST["E_duration_minutes"]))
    {
		$Error3 = "Duration fields must contain an integer";
	}
	else if($_POST["E_duration_days"] + $_POST["E_duration_hours"] + $_POST["E_duration_minutes"] <= 0)
	{
		$Error3 = "Duration must be a length of time greater than 0";
	}
	else
    {
		$E_duration_days = test_input($_POST["E_duration_days"]);
		$E_duration_hours = test_input($_POST["E_duration_hours"]);
		$E_duration_minutes = test_input($_POST["E_duration_minutes"]);
		
		$_SESSION['E_duration_days'] = $_POST['E_duration_days'];
		$_SESSION['E_duration_hours'] = $_POST['E_duration_hours'];
		$_SESSION['E_duration_minutes'] = $_POST['E_duration_minutes'];
	}
	
	if ($_POST["S_duration_days"] == "" || $_POST["S_duration_hours"] == "" || $_POST["S_duration_minutes"] == "")
    {
		$Error4 = "At least one duration field is required";
	}
	else if (!is_numeric($_POST["S_duration_days"]) || !is_numeric($_POST["S_duration_hours"]) || !is_numeric($_POST["S_duration_minutes"]))
    {
		$Error4 = "Duration fields must contain an integer";
	}
	else if($_POST["S_duration_days"] + $_POST["S_duration_hours"] + $_POST["S_duration_minutes"] <= 0)
	{
		$Error4 = "Duration must be a length of time greater than 0";
	}
	else
    {
		$S_duration_days = test_input($_POST["S_duration_days"]);
		$S_duration_hours = test_input($_POST["S_duration_hours"]);
		$S_duration_minutes = test_input($_POST["S_duration_minutes"]);
		
		$_SESSION['S_duration_days'] = $_POST['S_duration_days'];
		$_SESSION['S_duration_hours'] = $_POST['S_duration_hours'];
		$_SESSION['S_duration_minutes'] = $_POST['S_duration_minutes'];
	}
	
	if ($_POST["G_duration_days"] == "" || $_POST["G_duration_hours"] == "" || $_POST["G_duration_minutes"] == "")
    {
		$Error5 = "At least one duration field is required";
	}
	else if (!is_numeric($_POST["G_duration_days"]) || !is_numeric($_POST["G_duration_hours"]) || !is_numeric($_POST["G_duration_minutes"]))
    {
		$Error5 = "Duration fields must contain an integer";
	}
	else if($_POST["G_duration_days"] + $_POST["G_duration_hours"] + $_POST["G_duration_minutes"] <= 0)
	{
		$Error5 = "Duration must be a length of time greater than 0";
	}
	else
    {
		$G_duration_days = test_input($_POST["G_duration_days"]);
		$G_duration_hours = test_input($_POST["G_duration_hours"]);
		$G_duration_minutes = test_input($_POST["G_duration_minutes"]);
		
		$_SESSION['G_duration_days'] = $_POST['G_duration_days'];
		$_SESSION['G_duration_hours'] = $_POST['G_duration_hours'];
		$_SESSION['G_duration_minutes'] = $_POST['G_duration_minutes'];
	}
}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<script type="text/javascript"> 
			//function to stop the Enter key from submitting the form
			function stopRKey(evt) 
			{ 
				var evt = (evt) ? evt : ((event) ? event : null); 
				var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
				if ((evt.keyCode == 13) && (node.type=="text"))  
				{
					return false;
				} 
			} 

			document.onkeypress = stopRKey; 
		</script>
		<style>
			.error {color: #FF0000;}
		</style>	
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
							<h3 class="fl">CREATING NEW ASSIGNMENT: <?php echo $_SESSION['assignment_name'] ?></h3>					
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<p><span class="error">* required field.</span></p>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="flow-info">
								<fieldset>
									<?php							
									if($_SESSION['selected_task'] == "C")
									{
										if(isset($_POST['submit2']) && $Error1 == "" && $Error2 == "") //add new create restraint here
										{
											$_SESSION['C_question_type'] = $_POST['C_question_type'];
											$_SESSION['C_instructions'] = $_POST['C_instructions'];
											$_SESSION['C_duration_days'] = $_POST['C_duration_days'];
											$_SESSION['C_duration_hours'] = $_POST['C_duration_hours'];
											$_SESSION['C_duration_minutes'] = $_POST['C_duration_minutes'];
											$_SESSION['C_graded'] = $_POST['C_graded'];
											$_SESSION['C_late'] = $_POST['C_late'];
											$_SESSION['C_assignee'] = $_POST['C_assignee'];
											//new create parameter (submit)

											header('Location: http://web.njit.edu/~njr7/ce/proxy.php');
										}	

										if(isset($_POST['save2']))
										{
											$_SESSION['C_question_type'] = $_POST['C_question_type'];
											$_SESSION['C_instructions'] = $_POST['C_instructions'];
											$_SESSION['C_duration_days'] = $_POST['C_duration_days'];
											$_SESSION['C_duration_hours'] = $_POST['C_duration_hours'];
											$_SESSION['C_duration_minutes'] = $_POST['C_duration_minutes'];
											$_SESSION['C_graded'] = $_POST['C_graded'];
											$_SESSION['C_late'] = $_POST['C_late'];
											$_SESSION['C_assignee'] = $_POST['C_assignee'];
											//new create parameter (save)

											header('Location: http://web.njit.edu/~njr7/ce/index.php');
										}
									?>
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Create Problem" disabled="disabled" />
										</p>
									
										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
										</p>
										
										<br><br>
																				
										<p>
											<label for="C_question_type">Question Type:<span class="error"> *</span></label>
											<em>Choose a category to describe your question's type.</em>	
											<select id="C_question_type" name="C_question_type">
												<option selected value="Essay">Essay</option>
												<option value="Multiple_Choice">Multiple Choice</option>
												<option value="Programming">Programming</option>
											</select>
										</p>										

										<br><br>
										
										<p>
											<label for="C_instructions">Task Instructions:<span class="error"> * <?php echo $Error1;?></span></label>
											<em>Enter the instructions for this task.</em>	
											<textarea name="C_instructions" rows="4" cols="50"><?php echo $_SESSION["C_instructions"];?></textarea>
										</p>	
										
										<br><br>
										
										<p>
											<label for="C_duration">Duration:<span class="error"> * <?php echo $Error2;?></span></label>
											<em>Enter the maximum amount of time that this step will last.</em>	
											<input type="text" size="2" name="C_duration_days" id="C_duration_days" value="<?php echo $_SESSION["C_duration_days"];?>" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="C_duration_hours" id="C_duration_hours" value="<?php echo $_SESSION["C_duration_hours"];?>" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="C_duration_minutes" id="C_duration_minutes" value="<?php echo $_SESSION["C_duration_minutes"];?>" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>
										</p>

										<br><br>										
										
										<p>
											<h3>Does this task get graded?<span class="error"> *</span></h3>
											<select id="C_graded" name="C_graded">
												<option value="Yes">Yes</option>
												<option selected value="No">No</option>
											</select>
										</p>

										<p>
											<h3>What happens if users do not complete task on time? <span class="error"> *</span></h3>
											<select id="C_late" name="C_late">
												<option selected value="Opt1">The task is considered late</option>
												<option value="Opt2">The user forfeits right to complete the task any more</option>
												<option value="Opt3">The task is considered complete</option>
											</select>
										</p>

										<p>
											<h3>Who is assigned this task?<span class="error"> *</span></h3>
											<select id="C_assignee" name="C_assignee">
												<option value="Students">Students</option>
												<option selected value="Teacher">Teacher</option>
											</select>
										</p>

										<!-- New HTML form field here for Create -->
									<?php									
									}	

									if($_SESSION['selected_task'] == "E")
									{
										if(isset($_POST['submit2']) && $Error3 == "")
										{
											$_SESSION['E_duration_days'] = $_POST['E_duration_days'];
											$_SESSION['E_duration_hours'] = $_POST['E_duration_hours'];
											$_SESSION['E_duration_minutes'] = $_POST['E_duration_minutes'];
											$_SESSION['E_loop'] = $_POST['E_loop'];
											$_SESSION['E_graded'] = $_POST['E_graded'];
											$_SESSION['E_late'] = $_POST['E_late'];
											$_SESSION['E_assignee'] = $_POST['E_assignee'];
											//new edit parameter (submit)

											header('Location: http://web.njit.edu/~njr7/ce/proxy.php');
										}	

										if(isset($_POST['save2']))
										{
											$_SESSION['E_duration_days'] = $_POST['E_duration_days'];
											$_SESSION['E_duration_hours'] = $_POST['E_duration_hours'];
											$_SESSION['E_duration_minutes'] = $_POST['E_duration_minutes'];
											$_SESSION['E_loop'] = $_POST['E_loop'];
											$_SESSION['E_graded'] = $_POST['E_graded'];
											$_SESSION['E_late'] = $_POST['E_late'];
											$_SESSION['E_assignee'] = $_POST['E_assignee'];
											//new edit parameter (save)
											
											header('Location: http://web.njit.edu/~njr7/ce/index.php');
										}
									?>
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Edit Problem" disabled="disabled" />
										</p>

										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
										</p>
										
										<br><br>
										
										<p>
											<label for="E_duration">Duration:<span class="error"> * <?php echo $Error3;?></span></label>
											<em>Enter the maximum amount of time that this step will last.</em>
											<input type="text" size="2" name="E_duration_days" id="E_duration_days" value="<?php echo $_SESSION["E_duration_days"];?>" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="E_duration_hours" id="E_duration_hours" value="<?php echo $_SESSION["E_duration_hours"];?>" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="E_duration_minutes" id="E_duration_minutes" value="<?php echo $_SESSION["E_duration_minutes"];?>" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>
										</p>									

										<p>
											<h3>Does this task loop back to create problem until approved?<span class="error"> *</span></h3>
											<select id="E_loop" name="E_loop">
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</p>										
										
										<p>
											<h3>Does this task get graded?<span class="error"> *</span></h3>
											<select id="E_graded" name="E_graded" value="No">
												<option value="Yes">Yes</option>
												<option selected value="No">No</option>
											</select>
										</p>

										<p>
											<h3>What happens if users do not complete task on time?<span class="error"> *</span></h3>
											<select id="E_late" name="E_late">
												<option selected value="Opt1">The task is considered late</option>
												<option value="Opt2">The user forfeits right to complete the task any more</option>
												<option value="Opt3">The task is considered complete</option>
											</select>
										</p>	

										<p>
											<h3>Who is assigned this task?<span class="error"> *</span></h3>
											<select id="E_assignee" name="E_assignee">
												<option value="Students">Students</option>
												<option selected value="Teacher">Teacher</option>
											</select>
										</p>
										
										<!-- New HTML form field here for Edit -->
									<?php									
									}		
									
									if($_SESSION['selected_task'] == "S")
									{
										if(isset($_POST['submit2']) && $Error4 == "")
										{
											$_SESSION['S_duration_days'] = $_POST['S_duration_days'];
											$_SESSION['S_duration_hours'] = $_POST['S_duration_hours'];
											$_SESSION['S_duration_minutes'] = $_POST['S_duration_minutes'];
											$_SESSION['S_graded'] = $_POST['S_graded'];
											$_SESSION['S_late'] = $_POST['S_late'];
											$_SESSION['S_assignee'] = $_POST['S_assignee'];
											//new solve parameter (submit)

											header('Location: http://web.njit.edu/~njr7/ce/proxy.php');
										}	

										if(isset($_POST['save2']))
										{
											$_SESSION['S_duration_days'] = $_POST['S_duration_days'];
											$_SESSION['S_duration_hours'] = $_POST['S_duration_hours'];
											$_SESSION['S_duration_minutes'] = $_POST['S_duration_minutes'];
											$_SESSION['S_graded'] = $_POST['S_graded'];
											$_SESSION['S_late'] = $_POST['S_late'];
											$_SESSION['S_assignee'] = $_POST['S_assignee'];
											//new solve parameter (save)

											header('Location: http://web.njit.edu/~njr7/ce/index.php');
										}
									?>								
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Solve Problem" disabled="disabled" />
										</p>

										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
										</p>
										
										<br><br>
										
										<p>
											<label for="S_duration">Duration:<span class="error"> * <?php echo $Error4;?></span></label>
											<em>Enter the maximum amount of time that this step will last.</em>
											<input type="text" size="2" name="S_duration_days" id="S_duration_days" value="<?php echo $_SESSION["S_duration_days"];?>" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="S_duration_hours" id="S_duration_hours" value="<?php echo $_SESSION["S_duration_hours"];?>" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="S_duration_minutes" id="S_duration_minutes" value="<?php echo $_SESSION["S_duration_minutes"];?>" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>	
										</p>									

										<p>
											<h3>Does this task get graded?<span class="error"> *</span></h3>
											<select id="S_graded" name="S_graded">
												<option selected value="Yes" selected >Yes</option>
												<option value="No">No</option>
											</select>
										</p>

										<p>
											<h3>What happens if users do not complete task on time?<span class="error"> *</span></h3>
											<select id="S_late" name="S_late">
												<option selected value="Opt1">The task is considered late</option>
												<option value="Opt2">The user forfeits right to complete the task any more</option>
												<option value="Opt3">The task is considered complete</option>
											</select>
										</p>

										<p>
											<h3>Who is assigned this task?<span class="error"> *</span></h3>
											<select id="S_assignee" name="S_assignee">
												<option selected value="Students">Students</option>
												<option value="Teacher">Teacher</option>
											</select>
										</p>

										<!-- New HTML form field here for Solve-->

									<?php									
									}									
									
									if($_SESSION['selected_task'] == "G")
									{
										if(isset($_POST['submit2']) && $Error5 == "")
										{
											$_SESSION['G_duration_days'] = $_POST['G_duration_days'];
											$_SESSION['G_duration_hours'] = $_POST['G_duration_hours'];
											$_SESSION['G_duration_minutes'] = $_POST['G_duration_minutes'];
											$_SESSION['G_late'] = $_POST['G_late'];
											$_SESSION['G_assignee'] = $_POST['G_assignee'];
											//new grade parameter (submit)

											header('Location: http://web.njit.edu/~njr7/ce/proxy.php');
										}	

										if(isset($_POST['save2']))
										{
											$_SESSION['G_duration_days'] = $_POST['G_duration_days'];
											$_SESSION['G_duration_hours'] = $_POST['G_duration_hours'];
											$_SESSION['G_duration_minutes'] = $_POST['G_duration_minutes'];
											$_SESSION['G_late'] = $_POST['G_late'];
											$_SESSION['G_assignee'] = $_POST['G_assignee'];
											//new grade parameter (save)

											header('Location: http://web.njit.edu/~njr7/ce/index.php');
										}
									?>								
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Grading" disabled="disabled" />
										</p>

										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
										</p>
										
										<br><br>
										
										<p>
											<label for="G_duration">Duration:<span class="error"> * <?php echo $Error5;?></span></label>
											<em>Enter the maximum amount of time that this step will last.</em>	
											<input type="text" size="2" name="G_duration_days" id="G_duration_days" value="<?php echo $_SESSION["G_duration_days"];?>" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="G_duration_hours" id="G_duration_hours" value="<?php echo $_SESSION["G_duration_hours"];?>" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="G_duration_minutes" id="G_duration_minutes" value="<?php echo $_SESSION["G_duration_minutes"];?>" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>
										</p>	

										<p>
											<h3>What happens if users do not complete task on time?<span class="error"> *</span></h3>
											<select id="G_late" name="G_late">
												<option selected value="Opt1">The task is considered late</option>
												<option value="Opt2">The user forfeits right to complete the task any more</option>
												<option value="Opt3">The task is considered complete</option>
											</select>
										</p>	

										<p>
											<h3>Who is assigned this task?<span class="error"> *</span></h3>
											<select id="G_assignee" name="G_assignee">
												<option value="Students">Students</option>
												<option selected value="Teacher">Teacher</option>
											</select>
										</p>

										<!-- New HTML form field here for Grade -->
									<?php									
									}									
									?>
									
									<br><br><br>
									
									<input type="submit" name="submit2" value="Submit" class="dark" />
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									<input type="submit" name="save2" value="Save but do not submit" class="dark" />
									&nbsp &nbsp
									<a href="http://web.njit.edu/~njr7/ce/restart.php" class="dark button">Cancel without saving</a>
									
								</fieldset>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</body>
</html>