<?php
	session_start();
	ob_start();
	session_destroy();
?>
	<script language="javascript">
        //alert("Sesi�n Cerrada");
        window.location="../index.php";
	</script>