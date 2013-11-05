<?php

session_start();

if($_POST['selected_task'] != NULL)
{
	$_SESSION['selected_task'] = $_POST['selected_task'];
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
							<h3 class="fl">CREATING NEW ASSIGNMENT: <?php echo $_SESSION['assignment_name'] ?></h3>					
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<form action="http://web.njit.edu/~njr7/ce/proxy.php" method="post" id="create_question">
								<fieldset>								
									<?php							
									if($_SESSION['selected_task'] == "C")
									{
									?>
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Create Problem" disabled="disabled" />
										</p>
									
										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
											<em>This is the current question you are creating combined with your current task step.</em>
										</p>
										
										<br><br>
																				
										<p>
											<label for="C_question_type">Question Type:</label>
											<select id="C_question_type" name="C_question_type">
												<option value=""></option>
												<option value="A">Essay</option>
												<option value="B">Multiple Choice</option>
												<option value="C">Programming</option>
											</select>
										</p>										

										<br><br>
										
										<p>
											<label for="C_description">Task Description:</label>
											<textarea name="C_description" rows="4" cols="50"></textarea>
											<em>Enter the description/instructions for this task.</em>	
										</p>	
										
										<br><br>
										
										<p>
											<label for="C_duration">Duration:</label>
											<input type="text" size="2" name="C_duration_days" id="C_duration_days" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="C_duration_hours" id="C_duration_hours" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="C_duration_minutes" id="C_duration_minutes" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>
											
											<em>Enter the maximum amount of time that this step will last.</em>	
										</p>

										<br><br>										
										
										<p>
											<h3>What happens if users do not complete task on time?</h3>
											<select id="C_late" name="C_late">
												<option value=""></option>
												<option value="A">The task is considered late</option>
												<option value="B">The user forfeits right to complete the task any more</option>
												<option value="C">The task is considered complete</option>
											</select>
										</p>
										
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/index.php" class="dark button">Save and cancel</a>
										&nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/restart.php" class="dark button">Cancel without saving</a>
								
									<?php									
									}	

									if($_SESSION['selected_task'] == "E")
									{
									?>
										<p>
											<label for="task_type">Task Type</label>
											<input type="text" name="task_type" id="task_type" value="Edit Problem" disabled="disabled" />
										</p>

										<p>
											<label for="question_id">Question and Task ID</label>
											<input type="text" name="question_id" id="question_id" value="<?php echo "Q" . $_SESSION['current_question'] . " - " . "T" . $_SESSION['current_task'];?>" disabled="disabled" />
											<em>This is the current question you are creating combined with your current task step.</em>
										</p>
										
										<br><br>
										
										<p>
											<label for="E_duration">Duration:</label>
											<input type="text" size="2" name="E_duration_days" id="E_duration_days" />
											<select id="days" name="days">
												<option value="">Days</option>
											</select>
											
											<input type="text" size="2" name="E_duration_hours" id="E_duration_hours" />
											<select id="hours" name="hours">
												<option value="">Hours</option>
											</select>
											
											<input type="text" size="2" name="E_duration_minutes" id="E_duration_minutes" />
											<select id="minutes" name="minutes">
												<option value="">Minutes</option>
											</select>
											
											<em>Enter the maximum amount of time that this step will last.</em>	
										</p>									
									
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/index.php" class="dark button">Save and cancel</a>
										&nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/restart.php" class="dark button">Cancel without saving</a>
								
									<?php									
									}		
									
									if($_SESSION['selected_task'] == "S")
									{
									?>								
									
									
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/index.php" class="dark button">Save and cancel</a>
										&nbsp &nbsp
										<a href="http://web.njit.edu/~njr7/ce/restart.php" class="dark button">Cancel without saving</a>
								
									<?php									
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