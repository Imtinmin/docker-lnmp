<?php
session_start();
if (isset($_SESSION['user'])){
	unset($_SESSION['user']);
	echo'<script>alert("注销成功")</script>';
}else{
	echo'<script>alert("还没登录呢")</script>';
}
	header("refresh:1;url=http://127.0.0.1:801/wifi/app");
?>
<!--
<script type="text/javascript">
	sessionStorage.removeItem('user');
</script>
-->