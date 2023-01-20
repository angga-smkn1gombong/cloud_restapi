<?php
require_once "apiconnectdb.php";
class Person 
{

	public function get_person()
	{
		global $mysqli;
		$query="SELECT * FROM person";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Person Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
		//return json_encode($response);
	}

	public function get_person_by_id($id=0)
	{
		global $mysqli;
		$query="SELECT * FROM person";
		if($id != 0)
		{
			$query.=" WHERE id=".$id." LIMIT 1";
		}
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Person Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function insert_person()
	{
		global $mysqli;
		$arrcheckpost = array(
			'first_name' => '',
			'last_name' => '',
			'email' => '',
			'gender' => '');
		$hitung = count(array_intersect_key($_POST, $arrcheckpost));
		if($hitung == count($arrcheckpost)){
		
			$result = mysqli_query($mysqli, "INSERT INTO person SET
			first_name = '$_POST[first_name]',
			last_name = '$_POST[last_name]',
			email = '$_POST[email]',
			gender = '$_POST[gender]'");
			
			if($result)
			{
				$response=array(
					'status' => 1,
					'message' =>'Person Added Successfully.'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'message' =>'Person Addition Failed.'
				);
			}
		}else{
		$response=array(
					'status' => 0,
					'message' =>'Parameter Do Not Match'
				);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function update_person($id)
	{
		global $mysqli;
		$arrcheckpost = array(
			'first_name' => '',
			'last_name' => '',
			'email' => '',
			'gender' => '');
		$hitung = count(array_intersect_key($_POST, $arrcheckpost));
		if($hitung == count($arrcheckpost)){
		
			$result = mysqli_query($mysqli, "UPDATE person SET
			first_name = '$_POST[first_name]',
			last_name = '$_POST[last_name]',
			email = '$_POST[email]',
			gender = '$_POST[gender]'
			WHERE id='$id'");
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'message' =>'Person Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'message' =>'Person Updation Failed.'
			);
		}
		}else{
		$response=array(
					'status' => 0,
					'message' =>'Parameter Do Not Match'
				);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	function delete_person($id)
   {
      global $mysqli;
      $query="DELETE FROM person WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Person Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Person Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}

?>
