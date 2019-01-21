<?php
session_start();
require_once('statics/header.html');
require_once('func.php');
?>

  <title>test</title>
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
<?php if(!isset($a)){ //主页代码?>
<div class="container" id="MainPage">
   <div class="cover">
    <h2>OpenWrt<small><a href="https://x10sec.org/">X10Sec.Org</a></small></h2>
</div>
<div id="info" class="col-md-5 col-md-offset-4">
                <div class="alert alert-success" role="alert">
                    <h4>一个菜鸡写的前端</h4><br/>
                    <a href="login.php"><strong>Login first</strong></a><br />
		    xxx
                </div>
            </div>
</div>
<?php }?>
<?php

if (isset($a)){
  if(waf($a)){
    if (isset($_SESSION['user'])){
      @require('attack_tools/'.$_GET['a'].".php");
    }else{

    header('Location:login.php');
    echo '<script>alert("你还没登录呢！")</script>';

        }
    }
  else{
  die('You are hacker');
}
}

include('statics/footer.html');
?>

