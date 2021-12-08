<?php
	session_start();
	unset($_SESSION['user_session_comptable']);
	// session_destroy('user_session_ipmie');
		header("Location: ../../");

?>