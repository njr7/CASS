<?php

session_start();

$_SESSION['current_question'] = 1;
$_SESSION['current_task'] = 0;

// Error handling and required field variables
$Error1 = $Error2 = $Error3 = "";
$assignment_name = $number_of_questions = $group_size = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST["assignment_name"] == "")
    {
		$Error1 = "Assignment Name is required";
	}
	else
    {
		$assignment_name = test_input($_POST["assignment_name"]);
		$_SESSION['assignment_name'] = $_POST['assignment_name'];
	}

	if ($_POST["assignment_description"] != "")
    {
		$_SESSION['assignment_description'] = $_POST['assignment_description'];
	}	
	
	if ($_POST["number_of_questions"] == "")
    {
		$Error2 = "Number of Questions is required";
	}
	else if (!is_numeric($_POST["number_of_questions"]))
    {
		$Error2 = "Number of Questions must be an integer";
	}
	else if($_POST["number_of_questions"] <= 0)
	{
		$Error2 = "Number of questions must be greater than zero";
	}
	else
    {
		$number_of_questions = test_input($_POST["number_of_questions"]);
		$_SESSION['number_of_questions'] = $_POST['number_of_questions'];
	}
		
	if ($_POST["group_size"] == "")
    {
		$Error3 = "Group Size is required";
	}
	else if (!is_numeric($_POST["group_size"]))
    {
		$Error3 = "Group Size must be an integer";
	}
	else if($_POST["group_size"] <= 0)
	{
		$Error3 = "Group Size must be greater than zero";
	}
	else
    {
		$group_size = test_input($_POST["group_size"]);
		$_SESSION['group_size'] = $_POST['group_size'];
	}
}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

if(isset($_POST['submit']) && $Error1 == "" && $Error2 == "" && $Error3 == "")
{
	$_SESSION['assignment_name'] = $_POST['assignment_name'];
	$_SESSION['assignment_description'] = $_POST['assignment_description'];
	$_SESSION['number_of_questions'] = $_POST['number_of_questions'];
	$_SESSION['group_size'] = $_POST['group_size'];

	header('Location: http://web.njit.edu/~njr7/ce/form1.php');
}

if(isset($_POST['save']))
{
	$_SESSION['assignment_name'] = $_POST['assignment_name'];
	$_SESSION['assignment_description'] = $_POST['assignment_description'];
	$_SESSION['number_of_questions'] = $_POST['number_of_questions'];
	$_SESSION['group_size'] = $_POST['group_size'];

	header('Location: http://web.njit.edu/~njr7/ce/index.php');
}

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<script type="text/javascript"> 
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
							<h3 class="fl">CREATE NEW ASSIGNMENT</h3>			
						</div>	
					</div>
					<div class="content-module-main cf">
						<div class="half-size-column fl">
							<p><span class="error">* required field.</span></p>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="flow-info">
								<fieldset>								
									<p>										
										<label for="assignment_name">Assignment Name:<span class="error"> * <?php echo $Error1;?></span></label>
										<em>Enter the title of this assignment.</em>	
										<input type="text" name="assignment_name" value="<?php echo $_SESSION["assignment_name"];?>" id="assignment_name" class="round full-width-input"/>
									</p>	
									<br><br>
									<p>
										<label for="assignment_description">Assignment Description:</label>
										<em>Enter a description for this assignment. (Optional)</em>	
										<textarea name="assignment_description" rows="4" cols="50"><?php echo $_SESSION["assignment_description"];?></textarea>
									</p>										
									<br><br>
									
									<?php 
									if($_SESSION["number_of_questions"])
									{
									?>
									<p>
										<label for="number_of_questions">Number of Questions:<span class="error"> * <?php echo $Error2;?></span></label>
										<em>Enter the total number of questions that this assignment will contain.</em>	
										<input type="text" size="2" name="number_of_questions" value="<?php echo $_SESSION["number_of_questions"];?>" id="number_of_questions" />
									</p>
									<?php
									}
									?>
									
									<?php 
									if(!$_SESSION["number_of_questions"])
									{
									?>
									<p>
										<label for="number_of_questions">Number of Questions:<span class="error"> * <?php echo $Error2;?></span></label>
										<em>Enter the total number of questions that this assignment will contain.</em>	
										<input type="text" size="2" name="number_of_questions" value="1" id="number_of_questions" />
									</p>
									<?php
									}
									?>
									
									<br><br>

									<?php 
									if($_SESSION["group_size"])
									{
									?>									
									<p>
										<label for="group_size">Group Size:<span class="error"> * <?php echo $Error3;?></span></label>
										<em>Enter how many students there will be per group. 1 represents no groups.</em>
										<input type="text" size="2" name="group_size" value="<?php echo $_SESSION["group_size"];?>" id="group_size" />
									</p>									
									<?php
									}
									?>

									<?php 
									if(!$_SESSION["group_size"])
									{
									?>
									<p>
										<label for="group_size">Group Size:<span class="error"> * <?php echo $Error3; ?></span></label>
										<em>Enter the total number of questions that this assignment will contain.</em>	
										<input type="text" size="2" name="group_size" value="1" id="group_size" />
									</p>
									<?php
									}
									?>									
									<p>									
										<br><br><br>
										<input type="submit" name="submit" value="Submit" class="dark" />
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<input type="submit" name="save" value="Save but do not submit" class="dark" />
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