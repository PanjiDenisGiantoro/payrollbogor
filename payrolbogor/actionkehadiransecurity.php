<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'payrol');

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($connect, $input["masuk"]);
$first_name1 = mysqli_real_escape_string($connect, $input["keluar"]);
if($input["action"] === 'edit')
{
 $query = "
 UPDATE kehadirans 
 SET masuk = '".$first_name."', 
 keluar = '".$first_name1."' 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM kehadirans 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
