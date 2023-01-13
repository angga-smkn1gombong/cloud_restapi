<?php
require_once "apimethod.php";
$person = new Person();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
		if(!empty($_GET["id"]))
		{
			$id=intval($_GET["id"]);
			$person->get_person_by_id($id);
		}
		else
		{
			$person->get_person();
		}
		break;
	case 'POST':
		if(!empty($_GET["id"]))
		{
			$id=intval($_GET["id"]);
			$person->update_person($id);
		}
		else
		{
			$person->insert_person();
		}     
		break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>
