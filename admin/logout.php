<?php
  session_start();
  session_destroy();
  echo "<script>window.alert('Sukses Log out');
				window.location='index.php'</script>";
	die();
		

?>