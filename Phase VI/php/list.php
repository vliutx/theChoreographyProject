<?php

session_start();

$id = trim($_POST['id']);

$url = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=".$id."&format=json";
$list = get_listed_videos();

$code = get_http_response_code($url);
if ($code != 200){
	echo "false";
}
elseif (in_array($id, $list)){
	echo "taken";
}
else{
	$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_vl5649","target4mercy-Know","cs329e_mitra_vl5649");
	$author = $_SESSION['user'];
	$title = mysqli_real_escape_string($con, trim($_POST['title']));
	$genre = trim($_POST['genre']);
	$style = trim($_POST['style']);
	$descrip = mysqli_real_escape_string($con, trim($_POST['descrip']));
	$sql = "INSERT INTO TCP (ID, Author, Title, Genre, Style, Descrip) VALUES ('$id','$author','$title','$genre','$style','$descrip')";
	mysqli_query($con, $sql);
	mysqli_close($con);
	echo "true";
}

function get_http_response_code($url) {
  $headers = get_headers($url);
  return substr($headers[0], 9, 3);
}

function get_listed_videos(){
	$videos = array();

	$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_vl5649","target4mercy-Know","cs329e_mitra_vl5649");
	$ids = mysqli_query($con, "SELECT ID FROM TCP");

	while ($row = mysqli_fetch_assoc($ids)){
		$videos[] = $row['ID'];
	}
	mysqli_close($con);
	return $videos;
}

?>
