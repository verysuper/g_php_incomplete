<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<link href="../jquery-mobile/jquery.mobile.theme-1.3.0.min.css" rel="stylesheet" type="text/css">
<link href="../jquery-mobile/jquery.mobile.structure-1.3.0.min.css" rel="stylesheet" type="text/css">
<script src="../jquery-mobile/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../jquery-mobile/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
</head>

<body>
<div data-role="page" id="page">
  <div data-role="header">
    <h1>頁首</h1>
  </div>
  <div data-role="content">
    <div data-role="fieldcontain">
      <label for="flipswitch">選項:</label>
      <select name="flipswitch" id="flipswitch" data-role="slider">
        <option value="off" selected>關閉</option>
        <option value="on">開啟</option>
      </select>
    </div>
  
  </div>
  <div data-role="footer">
    <h4>頁尾</h4>
  </div>
</div>
</body>
</html>