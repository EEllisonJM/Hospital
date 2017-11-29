<?php
	session_start();
	ob_start();
	session_destroy();
?>
	<script language="javascript">
        //alert("Sesión Cerrada");
        window.location="../index.php";
	</script>