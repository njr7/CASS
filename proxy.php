<?php

session_start();

if($_SESSION['assignment_xml'])
{
	$assignment_xml = $_SESSION['assignment_xml'];
	$assignment = new SimpleXMLElement($assignment_xml);
}

if($_SESSION['current_task'] == 1 && $_SESSION['current_question'] == 1)
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
		<workflow>
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
				<graded>
				</graded>
				<if_late>
				</if_late>
				<task_assignee>
				</task_assignee>
			</createparams>
			<editparams>
				<duration_days>
				</duration_days>
				<duration_hours>
				</duration_hours>
				<duration_minutes>
				</duration_minutes>
				<loop>
				</loop>
				<graded>
				</graded>
				<if_late>
				</if_late>
				<task_assignee>
				</task_assignee>
			</editparams>
			<solutionparams>
				<duration_days>
				</duration_days>
				<duration_hours>
				</duration_hours>
				<duration_minutes>
				</duration_minutes>
				<graded>
				</graded>
				<if_late>
				</if_late>
				<task_assignee>
				</task_assignee>
			</solutionparams>
			<gradingparams>
				<duration_days>
				</duration_days>
				<duration_hours>
				</duration_hours>
				<duration_minutes>
				</duration_minutes>
				<if_late>
				</if_late>
				<task_assignee>
				</task_assignee>
			</gradingparams>
		</workflow>
	</assignment>";
	
	$assignment = new SimpleXMLElement($xmlstr);
	
	$assignment->name[0] = $_SESSION['assignment_name'];
	$assignment->description[0] = $_SESSION['assignment_description'];
	$assignment->num_questions[0] = $_SESSION['number_of_questions'];
	$assignment->group_size[0] = $_SESSION['group_size'];
}

if($_SESSION['selected_task'] == "C")
{
	$assignment->workflow[0]->createparams[0]->question_type[$_SESSION['current_question'] - 1] = $_SESSION['C_question_type'];
	$assignment->workflow[0]->createparams[0]->instructions[$_SESSION['current_question'] - 1] = $_SESSION['C_instructions'];
	$assignment->workflow[0]->createparams[0]->duration_days[$_SESSION['current_question'] - 1] = $_SESSION['C_duration_days'];
	$assignment->workflow[0]->createparams[0]->duration_hours[$_SESSION['current_question'] - 1] = $_SESSION['C_duration_hours'];
	$assignment->workflow[0]->createparams[0]->duration_minutes[$_SESSION['current_question'] - 1] = $_SESSION['C_duration_minutes'];
	$assignment->workflow[0]->createparams[0]->graded[$_SESSION['current_question'] - 1] = $_SESSION['C_graded'];
	$assignment->workflow[0]->createparams[0]->if_late[$_SESSION['current_question'] - 1] = $_SESSION['C_late'];
	$assignment->workflow[0]->createparams[0]->task_assignee[$_SESSION['current_question'] - 1] = $_SESSION['C_assignee'];

}

if($_SESSION['selected_task'] == "E")
{
	$assignment->workflow[0]->editparams[0]->duration_days[$_SESSION['current_question'] - 1] = $_SESSION['E_duration_days'];
	$assignment->workflow[0]->editparams[0]->duration_hours[$_SESSION['current_question'] - 1] = $_SESSION['E_duration_hours'];
	$assignment->workflow[0]->editparams[0]->duration_minutes[$_SESSION['current_question'] - 1] = $_SESSION['E_duration_minutes'];
	$assignment->workflow[0]->editparams[0]->loop[$_SESSION['current_question'] - 1] = $_SESSION['E_loop'];
	$assignment->workflow[0]->editparams[0]->graded[$_SESSION['current_question'] - 1] = $_SESSION['E_graded'];
	$assignment->workflow[0]->editparams[0]->if_late[$_SESSION['current_question'] - 1] = $_SESSION['E_late'];
	$assignment->workflow[0]->editparams[0]->task_assignee[$_SESSION['current_question'] - 1] = $_SESSION['E_assignee'];
}

if($_SESSION['selected_task'] == "S")
{
	$assignment->workflow[0]->solutionparams[0]->duration_days[$_SESSION['current_question'] - 1] = $_SESSION['S_duration_days'];
	$assignment->workflow[0]->solutionparams[0]->duration_hours[$_SESSION['current_question'] - 1] = $_SESSION['S_duration_hours'];
	$assignment->workflow[0]->solutionparams[0]->duration_minutes[$_SESSION['current_question'] - 1] = $_SESSION['S_duration_minutes'];
	$assignment->workflow[0]->solutionparams[0]->graded[$_SESSION['current_question'] - 1] = $_SESSION['S_graded'];
	$assignment->workflow[0]->solutionparams[0]->if_late[$_SESSION['current_question'] - 1] = $_SESSION['S_late'];
	$assignment->workflow[0]->solutionparams[0]->task_assignee[$_SESSION['current_question'] - 1] = $_SESSION['S_assignee'];
}

if($_SESSION['selected_task'] == "G")
{
	$assignment->workflow[0]->gradingparams[0]->duration_days[$_SESSION['current_question'] - 1] = $_SESSION['G_duration_days'];
	$assignment->workflow[0]->gradingparams[0]->duration_hours[$_SESSION['current_question'] - 1] = $_SESSION['G_duration_hours'];
	$assignment->workflow[0]->gradingparams[0]->duration_minutes[$_SESSION['current_question'] - 1] = $_SESSION['G_duration_minutes'];
	$assignment->workflow[0]->gradingparams[0]->if_late[$_SESSION['current_question'] - 1] = $_SESSION['G_late'];
	$assignment->workflow[0]->gradingparams[0]->task_assignee[$_SESSION['current_question'] - 1] = $_SESSION['G_assignee'];
}

if($_SESSION['current_task'] == 4)
{
	$_SESSION['current_task'] = 0;
	$_SESSION['current_question'] = $_SESSION['current_question'] + 1;
	$_SESSION['assignment_xml'] = $assignment->asXML();
	header('Location: http://web.njit.edu/~njr7/ce/success.php');
}
else
{
	$_SESSION['assignment_xml'] = $assignment->asXML();
	
	header('Location: http://web.njit.edu/~njr7/ce/form1.php');
}
?>