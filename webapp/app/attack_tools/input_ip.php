
<ul class="nav navbar-nav navbar-right">  
<?php if (!isset($_SESSION['admin'])) { ?>          
	<li><a href="login.php">登录</a></li>
<?php }else { ?>
	<li><a href="logout.php">退出</a></li>
<?php }?>
</ul>
  </div>  
</nav>
<div class="container">
	

</div>
<?php
include"footer.html";
?>