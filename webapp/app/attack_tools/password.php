<ul class="nav navbar-nav navbar-right">
<?php if(!isset($_SESSION['user'])) { ?>        
	<li><a href="login.php">登录</a></li>
<?php } else{ ?>
	<li><a href="logout.php">退出</a></li>
<?php } ?>
</ul>  
</nav>

<div class="container theme-showcase" role="main"> 
	<div class="jumbotron">
        <h3><strong>弱密码存储器</strong></h3>
</div>
<div class="col-md-4 col-md-offset-4">
      <div class="pull-left"> 
        <form action="./password.php" method="post">
<textarea rows="4" cols="50" name="comment" placeholder="please input password">
</textarea>
<input type="submit" name="sub" class="btn btn-primary" value="存储">
</form>
<?php
if(isset($_POST['sub']))
{
$myfile = fopen("./pass.txt", "w") or die("Unable to open file!");
$txt = $_POST['comment'];
fwrite($myfile, $txt);
echo "succ";
echo $txt;
fclose($myfile);
}
?>
 </div>
</div>

