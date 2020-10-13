<?php 
	include '../lib/Session.php';
	Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php
	$db = new Database();
?>
<?php 
	if(!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL){
		echo "<script>window.location = 'sliderlist.php';</script>";
		//header("Location:catlist.php");
	} else {
		$sliderid = $_GET['sliderid'];
		
		$query = "select * from tbl_slider where id='$sliderid' ";
		$getData = $db->select($query);
		if($getData){
			while($delimg = $getData->fetch_assoc()){
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}

		$delquery = "delete from tbl_slider where id='$sliderid' ";
		$delData = $db->select($delquery);
		if($delquery){
			echo "<script>alert('Slider Deleted Successfully.');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
		} else{
			echo "<script>alert('Slider Not Deleted.');</script>";
			echo "<script>window.location = 'sliderlist.php';</script>";
		}
	}
?>