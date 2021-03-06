<?php require_once('../Connections/shop.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_productList = 5;
$pageNum_productList = 0;
if (isset($_GET['pageNum_productList'])) {
  $pageNum_productList = $_GET['pageNum_productList'];
}
$startRow_productList = $pageNum_productList * $maxRows_productList;

mysql_select_db($database_shop, $shop);
$query_productList = "SELECT * FROM product WHERE `state` = 1 ORDER BY id DESC";
$query_limit_productList = sprintf("%s LIMIT %d, %d", $query_productList, $startRow_productList, $maxRows_productList);
$productList = mysql_query($query_limit_productList, $shop) or die(mysql_error());
$row_productList = mysql_fetch_assoc($productList);

if (isset($_GET['totalRows_productList'])) {
  $totalRows_productList = $_GET['totalRows_productList'];
} else {
  $all_productList = mysql_query($query_productList);
  $totalRows_productList = mysql_num_rows($all_productList);
}
$totalPages_productList = ceil($totalRows_productList/$maxRows_productList)-1;

$queryString_productList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_productList") == false && 
        stristr($param, "totalRows_productList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_productList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_productList = sprintf("&totalRows_productList=%d%s", $totalRows_productList, $queryString_productList);
 session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Shop.dwt.php" codeOutsideHTMLIsLocked="false" -->
<script language="javascript" src="../Scripts/menu.js"/></script>
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>伴手網</title>
<!-- InstanceEndEditable -->

<!-- Meta Tags -->
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<meta name="robots"      content="index, follow" />
<meta name="description" content="" />
<meta name="keywords"    content="" />
<meta name="author"      content="" />

<!-- Favicon -->
<link rel="shortcut icon" href="" />

<!-- CSS -->
<link rel="stylesheet" href="../css/styles.css" media="all" type="text/css" />

<!-- RSS -->
<link rel="alternate" href="" title="RSS Feed" type="application/rss+xml" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
  <div id="header">
      <div class="subContainer">
            <div id="logo">
            <div id="box">H2H</div>
            <p>咱的好伴手</p>
            </div><!-- /logo -->
    </div><!-- /subContainer -->
</div><!-- header -->
    
<div id="navigation">   
	<ul id="sddm">
        <li><a href="index.php">首頁</a></li>
        <li><a href="product.php">商品資料</a></li>
        <li><a href="cart.php">購物車</a></li>
        <li><a href="checkOut.php">結帳</a></li>     
        <li><a href="guestBook.php">留言板</a></li>        
        <li><a href="titleView.php">討論區</a></li>
	    <li><a href="#" 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()">會員中心</a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="reconfirm.php">重發確認信</a>
        <a href="modifydata.php">修改基本資料</a>
        <a href="forgetpassword.php">忘記密碼</a>
        </div>
    	</li>
	    <li><a href="#" 
        onmouseover="mopen('m2')" 
        onmouseout="mclosetime()">公佈欄</a>
        <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="publishBrowser.php">瀏覽公佈欄</a>
        </div>
    	</li>
		</ul> 
<div style="clear:both"></div>    
</div><!-- /navigation -->
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="780" height="120">
    <param name="movie" value="../Scripts/pic.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="8.0.35.0" />

    <param name="expressinstall" value="../Scripts/expressInstall.swf" />
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="../Scripts/pic.swf" width="780" height="120">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="8.0.35.0" />
      <param name="expressinstall" value="../Scripts/expressInstall.swf" />
      <div>
        <h4>這個頁面上的內容需要較新版本的 Adobe Flash Player。</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="取得 Adobe Flash Player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
<div id="container"><!-- InstanceBeginEditable name="EditRegion1" -->
  <div id="primaryContent">
    <h2>商品瀏覽</h2>
	<h3>點「詳細」按鈕可以獲得詳細的商品說明，點「訂購」可加入購物車中。</h3>
    <p>&nbsp;</p>
     [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, 0, $queryString_productList); ?>">第一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, max(0, $pageNum_productList - 1), $queryString_productList); ?>">上一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, min($totalPages_productList, $pageNum_productList + 1), $queryString_productList); ?>">下一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, $totalPages_productList, $queryString_productList); ?>">最後一頁</a>]第 <?php echo ($startRow_productList + 1) ?> 筆至第 <?php echo min($startRow_productList + $maxRows_productList, $totalRows_productList) ?> 筆/共 <?php echo $totalRows_productList ?>  筆
        <hr>
        <p>&nbsp;</p>
    <?php do { ?>
      <table border="1" width="100%">
        <tr>
          <td colspan="2" align="center">
            <a href="productDetail.php?id=<?php echo $row_productList['id']; ?>"><img src="picture/<?php echo $row_productList['id']; ?>.jpg" alt="" width="200"></a>
          </td>    		
          </tr>
        <tr>
          <th align="right"><p>商品名稱：</p></th>
          <td><h4><?php echo $row_productList['name']; ?></h4></td>
          </tr>
        <tr>
          <th align="right"><p>單價：</p></th>
          <td><h5><del><?php echo $row_productList['price']; ?></del> <?php echo $row_productList['price']; ?></h5></td>
          </tr>
        <tr>
          <td colspan="2" align="center">
            <button onclick="location.href='productDetail.php?id=<?php echo $row_productList['id']; ?>'">詳細</button>
            <button onclick="location.href='cart.php?id=<?php echo $row_productList['id']; ?>&add=additem'">訂購</button>
            </td>    		
          </tr>
      </table>
      
      <p>&nbsp;</p>
      <hr>
      <p>&nbsp;</p>
      <?php } while ($row_productList = mysql_fetch_assoc($productList)); ?>
    <p>&nbsp;</p>
     [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, 0, $queryString_productList); ?>">第一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, max(0, $pageNum_productList - 1), $queryString_productList); ?>">上一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, min($totalPages_productList, $pageNum_productList + 1), $queryString_productList); ?>">下一頁</a>]
        [<a href="<?php printf("%s?pageNum_productList=%d%s", $currentPage, $totalPages_productList, $queryString_productList); ?>">最後一頁</a>]第 <?php echo ($startRow_productList + 1) ?> 筆至第 <?php echo min($startRow_productList + $maxRows_productList, $totalRows_productList) ?> 筆/共 <?php echo $totalRows_productList ?>  筆
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- /comments -->
  </div>
<!-- InstanceEndEditable -->
  <!-- /primaryContent -->
  <div id="secondaryContent">
    <p>&nbsp;</p>
    <h3>最新商品</h3>
    <h3>相關連結</h3>
    <!-- 
            This part was designed to handle images
            -->
    <ul class="links">
      <li><a href="http://www.pcschool.com.tw/">巨匠電腦</a></li>
      <li><a href="http://kid.pcschool.com.tw/">兒童電腦</a></li>      
      <li><a href="http://www.soeasyedu.com.tw/">數位學習</a></li>
      <li><a href="http://www.soeasyedu.com.tw/">巨匠美語</a></li>  
      <li><a href="http://www.off.com.tw/weiblog">給我建議</a>
    </ul>
    <?php if(!isset($_SESSION['MM_Username'])){?>
    <h3>登入</h3>
    <h5><? echo $_GET['msg']; ?></h5>
    <form action="loginCheck.php" method="post">
      <p>
        <input value="" name="user" placeholder="user" />
      </p>
      <p>
        <input name="password" type="password" value="" placeholder="password" />
      </p>
        <button type="submit">送出</button>
        <button type="button" onclick="location.href='registerUser.php'">註冊會員</button>        
    </form>    
    
    <?php }else{ ?>
    <h3>會員服務</h3>
    <form action="logout.php" method="post">
    <p>歡迎 <?php echo $_SESSION['MM_Username'];?> 您光臨</p>
    <p><button type="submit">登出</button></p>
    </form>
    <?php }?>
  </div>
  <!-- /secondaryContent -->
        <br class="clear" />    
</div><!-- container -->
    
    <div id="footer">
        <ul>
            <li id="copyright">&copy; 2099 Free for Gjun student member</li>
            <li id="links">
                <ul>
                    <li><a href="#">XHTML</a> |</li>
                    <li><a href="#">CSS</a> |</li>
                    <li><a href="http://gjun.tw">ALAN CHEN</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /footer -->
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($productList);
?>
