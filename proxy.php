<?php

session_start();

if($_SESSION['assignment_xml'])
{
	$assignment_xml = $_SESSION['assignment_xml'];
	$assignment = new SimpleXMLElement($assignment_xml);
}

if($_SESSION['current_task'] == 1)
{
	$xmlstr = "<?xml version='1.0' standalone='yes'?>
	<assignment>
		<name>
		</name>
		<description>
		</description>
		<num_questions>
		</num_questions>
		<group_size>
		</group_size>
		<question>
			<order>
			</order>
			<createparams>
				<question_type>
				</question_type>
				<instructions>
				</instructions>
				<duration_days>
				</duration_days>
				<duration_hours>
				</duration_hours>
				<duration_minutes>
				</duration_minutes>
				<if_late>
				</if_late>
			</createparams>
			<editparams>
			</editparams>
			<solutionparams>
			</solutionparams>
		</question>
	</assignment>";
	
	$assignment = new SimpleXMLElement($xmlstr);
}

if($_SESSION['selected_task'] == "C")
{
	$_SESSION['C_question_type'] = $_POST['C_question_type'];
	$_SESSION['C_description'] = $_POST['C_description'];
	$_SESSION['C_duration_days'] = $_POST['C_duration_days'];
	$_SESSION['C_duration_hours'] = $_POST['C_duration_hours'];
	$_SESSION['C_duration_minutes'] = $_POST['C_duration_minutes'];
	$_SESSION['C_late'] = $_POST['C_late'];

	$assignment->name[0] = $_SESSION['assignment_name'];
	$assignment->description[0] = $_SESSION['assignment_description'];
	$assignment->num_questions[0] = $_SESSION['number_of_questions'];
	$assignment->group_size[0] = $_SESSION['group_size'];
	
	$assignment->question[$_SESSION['current_question'] - 1]->order[$_SESSION['current_task'] - 1] = $_SESSION['selected_task'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->question_type[0] = $_SESSION['C_question_type'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->instructions[0] = $_SESSION['C_description'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->duration_days[0] = $_SESSION['C_duration_days'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->duration_hours[0] = $_SESSION['C_duration_hours'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->duration_minutes[0] = $_SESSION['C_duration_minutes'];
	$assignment->question[$_SESSION['current_question'] - 1]->createparams[0]->if_late[0] = $_SESSION['C_late'];
}

$_SESSION['assignment_xml'] = $assignment->asXML();

header('Location: http://web.njit.edu/~njr7/ce/form1.php');

?>