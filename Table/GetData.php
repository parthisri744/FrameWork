<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$connect = mysqli_connect("localhost", "root", "", "parthisri");
$result = mysqli_query($connect, $request->sql);
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
 ?>