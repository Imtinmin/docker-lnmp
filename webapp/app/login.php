<?php
session_start();
//error_reporting(0);
require_once('statics/header.html');
?>

<?php
if (isset($_SESSION['user'])){
    header('Location:index.php');   //已登录则跳转主页
}else{
require_once('config.php');
$conn = mysqli_connect($GLOBALS['db_addr'],$GLOBALS['db_user'],$GLOBALS['db_pass'],$GLOBALS['db_name']);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
@$p_username = $_POST['username'];
//$p_username = trim($p_username);
$p_username = $conn->real_escape_string($p_username);
@$p_password = $_POST['password'];
//$p_password = trim($p_password);
$p_password = $conn->real_escape_string($p_password);
$sql = "SELECT * FROM ADMIN WHERE user='{$p_username}'";	//查询密码
if (isset($p_username) && strlen($p_username) > 0 && isset($p_password) && strlen($p_password) > 0){
	$result = $conn->query($sql);	
	if (!$result){
		$_SESSION['message'] = '用户名或密码错误';
	}else{
		$row = $result->fetch_array();
		if ($p_password===$row['password']){
			$_SESSION['message'] = '用户名或密码错误';
			$_SESSION['user'] = $row['id'];
			header('Location:index.php');
	}	
}

}

}
?>
<style type="text/css">
        body {
            padding-top: 50px;
            background-size: cover;
        }

        .center {
            padding: 40px 15px;
            width: auto;
            display: table;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
    <title></title>

</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">OpenWrt</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">攻击 <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a id="action-1" href="?a=ddos">断手包攻击</a></li>
              <li><a id="action-1" href="?a=pass">弱口令密码攻击</a></li>
        <li><a id="action-1" href="?a=password">弱口令密码存储</a></li>
        <li><a id="action-1" href="?a=handshake">wifi密码攻击</a></li>
              <li><a href="#">EJB</a></li>
              <li><a href="#">Jasper Report</a></li>
              <li class="divider"></li>
              <li><a href="#">分离的链接</a></li>
              <li class="divider"></li>
              <li><a href="#">另一个分离的链接</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">抓包 <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a id="action-1" href="#"></a></li>
              <li><a href="?a=input_ip">输入ip</a></li>
              <li><a href="#">Jasper Report</a></li>
              <li class="divider"></li>
              <li><a href="#">分离的链接</a></li>
              <li class="divider"></li>
              <li><a href="#">另一个分离的链接</a></li>
              </ul>
            </li>
        </ul>

<script>    

$('li.dropdown').mouseover(function() {   

     $(this).addClass('open');}).mouseout(function() {$(this).removeClass('open');}); 

</script>


<ul class="nav navbar-nav navbar-right">
<?php @$a = $_GET['a'];if (!isset($_SESSION['user'])) { ?>          
	<li><a href="login.php">登录</a></li>
<?php }else {?>
	<li><a href="logout.php">退出</a></li>
<?php }?>
</ul>
  </div>  
</nav>
</div>
</nav> 
<div class="container">
    <br />
    <div class="center">
        <h2>需要授权 <small>X10Sec.org</small></h2>
    </div>
<form class="form-signin" method="post">
<input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>

<input type="password" id="inputPassword" class="form-control" password="password" name="password" placeholder="Password" required> 
<div class="checkbox">
    <label>
        <input type="checkbox" id="remember" value="1" name="check">Remember me
    </label>
</div>
<button class="btn btn-lg btn-primary btn-block" OnClick="Setpwdchk()" type="submit">Sign in</button>
</form>
</div>
</div>
</body>
<?php
include 'statics/footer.html';
if (isset($SESSION['message'])){
	unset($SESSION['message']);

}
?>
<script src="statics/js/remember.js" ></script>