
<div class="container theme-showcase" role="main"> 
	<div class="jumbotron">
        <h3><strong>handshake攻击</strong></h3>
</div>
<div class="col-md-4 col-md-offset-4">
    <div class="input-group mb-3">
      <div class="pull-left"> 
        <form action="./handshake.php" method="post">
        <h4><strong>handshake</strong></h4>
	      <input id="textessid" name="essid" type="text" class="input-medium" placeholder="请输入" />
              <input type="submit" name="sub1" class="btn btn-primary" value="查看监听网卡">
<br />
<br />
	      <input type="submit" name="sub2" class="btn btn-primary" value="清空监听网卡">
	      <input type="submit" name="sub3" class="btn btn-primary" value="查看无线网卡">
	      <input type="submit" name="sub4" class="btn btn-primary" value="开启监听网卡">
<br />
<br />

              <input type="submit" name="sub5" class="btn btn-primary" value="查看周边无线">
              <input type="submit" name="sub6" class="btn btn-primary" value="抓取无线握手">
              <input type="submit" name="sub7" class="btn btn-primary" value="破解无线握手">


        </form>
<?php
        if(isset($_POST['sub1'])){
        $cmd = "airmon-ng";     //查看监听网卡信息
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub2'])){
        $cmd = "airmon-ng check kill";          //清空监听网卡信息
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub3'])){
        $cmd = "iwconfig";              //查看无线网卡信息
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub4'])){
        $cmd = "airmon-ng start wlan0";         //开启监听网卡信息
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub5'])){
        $cmd = "airodump-ng mon0";      //查看周边无线
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub6'])){
        $essid=$_POST["essid"];
        $cmd = "airodump-ng --bssid ".$essid."-c 6 -w sec mon0";      //抓取无线握手包
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }
        if(isset($_POST['sub7'])){
        $essid=$_POST["essid"];
        $cmd = "aircrack-ng --bssid ".$essid." -w pass.txt sec-01.cap";      //破解无线握手包密码
        while (@ ob_end_flush()); 
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc))
        {
        echo fread($proc, 4096);
        @ flush();
        }
        echo '</pre>';
        }

        ?>

      </div>
  </div>
</div>
