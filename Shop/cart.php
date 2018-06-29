<?php
require_once('../Connections/shop.php'); 
include('../cart/wfcart.php');
@session_start();
//將$cart的指標指向 Session
$cart =& $_SESSION['wfcart']; 
//若$cart不為物件，重新建立一個新的$cart物件
if(!is_object($cart)) $cart = new wfCart();
?>
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
    
    <?php
		//檢查是否有項目要加入購物車
		if($_GET['add'] && $_GET['id']!=NULL){
			//查詢資料表資料並且加入購物車中
			if($resource=mysql_query("select * from product where id=".$_GET['id'])){
				$row = mysql_fetch_assoc($resource);	
				$cart->add_item($row['id'],1,$row['price'],$row['name']);
			}
		}
		//檢查購物車是否有數量要更新
		if($_GET['edit'] && $_GET['id']!=NULL){
			$rid = intval($_GET['id']);	
			$qty = intval($_GET['qty']);
			$cart->edit_item($rid,$qty);
		}
		//檢查購物車是否有項目要移除
		if($_GET['remove'] && $_GET['id']!=NULL) {	
			$rid = intval($_GET['id']);
			$cart->del_item($rid);
		}
		//檢查是否要清空購物車
		if($_GET['empty']!=NULL){
			$cart->empty_cart();
		}
	?>
    
    <h2>購物車</h2>
	<h3>底下將列出您所購買的商品。</h3>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
    <?php
	if($cart->itemcount > 0){
	?>
    <table>
    	<tr>
    		<th width="15%" scope="col"><p>商品編號</p></th>
            <th width="30%" scope="col"><p>商品名稱</p></th>
            <th width="10%" scope="col"><p>數量</p></th>
            <th width="15%" scope="col"><p>單價</p></th>
            <th width="15%" scope="col"><p>小計</p></th>
            <th width="15%" scope="col"><p>操作</p></th>
    	</tr>
    	<?php
	  foreach($cart->get_contents() as $item){	  
	  ?>
        <form method="get">
        <input type="hidden" name="id" value="<?php echo $item['id'];?>"/>
          <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['info']; ?></td>
            <td><input style="size:portrait" type="text" name="qty" value="<?php echo $item['qty'];?>" size="1"/></td>
            <td><?php echo $item['price'];?></td>
            <td><?php echo $item['subtotal'];?></td>
            <td>
                <button name="edit" value="更新" type="submit">更新</button>
                <button value="移除" type="button" onclick="location.href='cart.php?id=<?php echo $item['id']; ?>&remove=removeitem'">移除</button>
            </td>
          </tr>
        </form>
        <?php
	  }
	  ?>
    	<tr>
            <td colspan="6" align="center" valign="middle">
                <?php echo "<h5>總計:".$cart->total."</h5>"; ?>
                <button value="清空購物車" type="button" onclick="location.href='cart.php?empty=emptyitem'">清空購物車</button>
                <button value="結帳" type="button">結帳</button>
            </td>
        </tr>
    </table>
     <?php
	}else{
		echo "<h5>目前購物車中無任何商品！</h5>";
	}
	?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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