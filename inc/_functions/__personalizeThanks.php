<?php

function ml_personalize_thankyou($content) {

	$person_name    = isset($_GET['first_name']) ? $_GET['first_name'] : 'there';
	$role_name      = isset($_GET['job_title']) ? $_GET['job_title'] : '';

	$content = str_replace('{{PERSON_NAME}}', $person_name, $content);
	$content = str_replace('{{JOB_TITLE}}', $role_name, $content);

	return $content;
}
