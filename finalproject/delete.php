<?php 

	include 'model.php';
	$model = new Model();
	$pemesan = $_REQUEST['pemesan'];
	$delete = $model->delete($pemesan);

	if ($delete) {
		echo "<script>alert('Data has been deleted!');</script>";
		echo "<script>window.location.href = 'records.php';</script>";
	}

 ?>