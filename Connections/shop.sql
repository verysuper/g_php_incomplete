-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-06-27 20:20:17
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `count`
--

CREATE TABLE `count` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '頁面編號',
  `counter` int(10) UNSIGNED NOT NULL COMMENT '計數值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `count`
--

INSERT INTO `count` (`id`, `counter`) VALUES
(1, 34);

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `titleid` int(11) NOT NULL COMMENT '討論主題編號',
  `detailsid` int(11) NOT NULL COMMENT '討論內容編號',
  `email` varchar(100) DEFAULT NULL COMMENT '電子郵件',
  `name` varchar(50) NOT NULL COMMENT '作者姓名',
  `subject` varchar(255) NOT NULL COMMENT '回應主題',
  `memo` text NOT NULL COMMENT '回應內容',
  `newsDate` datetime DEFAULT NULL COMMENT '回應內容建立日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `details`
--

INSERT INTO `details` (`titleid`, `detailsid`, `email`, `name`, `subject`, `memo`, `newsDate`) VALUES
(1, 1, 'aaron@ms11.url.com.tw', '王太太', 'FW:PHP好書推薦', '嗯！\r\n我也覺得這是一本不錯的書籍，\r\n歡迎大家一起分享心得', '2009-06-09 08:39:40'),
(2, 2, 'test@msa.hinet.net', '好好', 'FW:PHP好書推薦', '我也覺得不錯喔！', '2009-06-09 08:53:03'),
(6, 3, '444@444.444', '444', 'FW:444', '5555', '2018-06-11 19:31:09'),
(6, 4, '444@444.444', '444', 'FW:444', '6666', '2018-06-11 19:31:17'),
(6, 5, '444@444.444', '444', 'FW:444', '555\r\n5\r\n5\r\n5\r\n', '2018-06-11 19:56:06'),
(6, 6, '888', '888', 'FW:444', '8888', '2018-06-11 19:58:52'),
(7, 7, 'aaa@444.444', 'aaa', 'FW:aaaa', '1\r\n1\r\n1\r\n1', '2018-06-11 20:03:00'),
(7, 8, '888', '444', 'FW:aaaa', '1\r\n1\r\n1\r\n', '2018-06-11 20:03:21'),
(7, 9, 'aaa@444.444', 'ㄎㄨㄠ', 'FW:aaaa', '123\r\n123\r\n123', '2018-06-11 20:18:37');

-- --------------------------------------------------------

--
-- 資料表結構 `guestbook`
--

CREATE TABLE `guestbook` (
  `serial` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `guestbook`
--

INSERT INTO `guestbook` (`serial`, `name`, `email`, `subject`, `memo`, `date`) VALUES
(1, '陳巨匠', 'gjun@yahoo.com.tw', 'Dreamweaver真好用', 'Dreamweaver搭配PHP連結至MySQL就是這麼的簡單\r\n您一定要試試看喔！', '2009-06-06 17:26:52'),
(2, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(3, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(4, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(5, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(6, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(7, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(444, '444', '444@444.444', '444', '444\r\n444\r\n444\r\n444', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetail`
--

CREATE TABLE `orderdetail` (
  `O_id` int(11) NOT NULL COMMENT '訂單編號',
  `D_id` int(11) NOT NULL COMMENT '訂單細目編號',
  `D_pid` int(11) NOT NULL COMMENT '商品編號',
  `D_qty` int(11) NOT NULL COMMENT '訂購數量',
  `D_price` int(11) NOT NULL COMMENT '訂購金額'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orderdetail`
--

INSERT INTO `orderdetail` (`O_id`, `D_id`, `D_pid`, `D_qty`, `D_price`) VALUES
(1, 1, 14, 1, 680),
(1, 2, 12, 1, 1050),
(2, 3, 1, 1, 1470),
(2, 4, 5, 2, 1400),
(2, 5, 7, 1, 2150);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `O_id` int(11) NOT NULL COMMENT '訂單主檔編號',
  `O_name` varchar(20) NOT NULL COMMENT '收件人姓名',
  `O_phone` varchar(13) DEFAULT NULL COMMENT '收件人聯絡電話',
  `O_cellphone` varchar(13) DEFAULT NULL COMMENT '收件人行動電話',
  `O_address` varchar(60) NOT NULL COMMENT '收件人地址',
  `shipment` enum('Y','N') DEFAULT 'N' COMMENT '出貨否',
  `userid` varchar(20) NOT NULL COMMENT '訂購人會員ID',
  `orderDate` datetime NOT NULL COMMENT '訂購日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`O_id`, `O_name`, `O_phone`, `O_cellphone`, `O_address`, `shipment`, `userid`, `orderDate`) VALUES
(1, '陳巨匠', '06-2200940', '0934-291130', '台南市公園路108號', 'N', 'weill', '2009-06-10 14:42:51'),
(2, '李家明', '04-2314320', '0912-211112', '台中市中正路一段15巷7號', 'N', 'irock', '2009-06-22 14:43:42');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT '產品編號',
  `name` varchar(200) NOT NULL COMMENT '產品名稱',
  `introduce` text COMMENT '產品內容',
  `price` int(11) DEFAULT '0' COMMENT '產品單價',
  `qty` int(11) DEFAULT '0' COMMENT '產品庫存量',
  `state` tinyint(1) DEFAULT '1' COMMENT '產品上架否'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`id`, `name`, `introduce`, `price`, `qty`, `state`) VALUES
(14, '【彰化肉圓劉】肉圓(2盒20粒入)', '★商品特色\r\n超有名地方小吃肉圓劉員林肉圓金字招牌─肉圓劉。外皮獨特的水Q軟嫩帶點透明感，老頭家每天一早嚴選新鮮豬後腿肉及鮮甜筍角加上7種家傳秘方香料調製成美味內餡，內餡瘦肉', 680, 10, 1),
(13, '【起士公爵】草莓甜心乳酪蛋糕7吋(草莓季含運) ', '★商品特色\r\n法國進口的鮮釀草莓漿果，一向是搭配細緻的起士蛋糕的完美食材；清新可口的鮮釀漿果鮮嫩欲滴，絲毫沒有果醬的人工甜味，彷彿冬日的暖陽那樣叫人心曠神怡！再搭配經過特殊', 560, 10, 1),
(11, '【方王媽媽】乳酪饅頭20個', '★商品特色\r\n方王媽媽堅果饅頭是用特選麵粉做的，可以促進腸胃蠕動，並使用有驅散風寒等效用的黑糖。此外，饅頭也加入乳酪、黑糖、黃金豆\r\n。早餐食用方王媽媽堅果饅頭，可以促進腸胃', 700, 10, 1),
(12, '【方王媽媽】紅莓堅果饅頭30個', '★商品特色\r\n方王媽媽堅果饅頭是用特選麵粉做的，可以促進腸胃蠕動，並使用有驅散風寒等效用的黑糖。此外，饅頭也加入 紅麴、蔓越莓、松子、腰果、核桃、杏仁、南瓜子、葵瓜子、葡萄乾', 1050, 10, 1),
(8, ' 【福利麵包】墨西哥玉米片組合 ', '★可可布丁+杏仁布丁+芒果布丁+鮮奶布丁每組1種口味有3盒布丁，12個/組(單個約170g)。此組合含4組共48個布丁。\r\n\r\n★保存期限：未開封冷藏0～7℃保存下14天，常溫下勿超過4小時。\r\n', 490, 10, 1),
(7, '【依蕾特】綜合口味布丁(4盒)', '★商品特色\r\n\r\n依蕾特布丁奶酪系列－最受歡迎的作品:鮮奶布丁濃郁的鮮奶滲和鮮美的蛋汁，透著嬌黃鮮嫩的綿密布丁倒在平盤上時，香氣襲人的焦糖醬汁亦隨之緩緩留下，是視覺、嗅覺與味覺', 1560, 10, 1),
(6, '【黎記】-冰糖醬鴨-辣味(3盒含運)', '★商品說明\r\n說到滷味要透要入味，功夫做得最最徹底的，當是屏東『黎記冰糖醬鴨』莫屬。在屏東店內的廚房裡，數十支炒菜鍋兩邊擺開，眷村媽媽們人手一鏟，忙著在大火中為滷味收汁，直', 599, 10, 1),
(5, '【阿姿調味海鮮】精選無辣組合(燒酒螺、風螺、九層螺，各2盒)', '★商品特色\r\n1. 燒酒螺 : 採新鮮燒酒螺，再加上蒜頭、辣椒、特製醬油調配而成，味道讓略微辛辣，讓燒酒螺更加好風味。\r\n2. 風螺 : 新鮮的風螺搭配著風味獨特的阿姿醬料，再經過阿姿調味海', 700, 10, 1),
(4, '【純新】Milk17牛奶棒禮盒10包裝(巧克力)', '★商品特色\r\n長如42cm的竹筷子又俗稱〝筷子餅乾〞，5支包裝一包，一盒5包裝，共計11種口味，每種口味蜠有香純牛乳味，是值得品嚐點心。\r\n\r\n\r\n★商品成分\r\n麵粉、牛奶、糖 ', 599, 10, 1),
(3, '【純新】Milk17牛奶棒禮盒10包裝(原味)', '★商品特色\r\n長如42cm的竹筷子又俗稱〝筷子餅乾〞，5支包裝一包，一盒5包裝，共計11種口味，每種口味蜠有香純牛乳味，是值得品嚐點心。\r\n\r\n\r\n★商品成分\r\n麵粉、牛奶、糖 ', 599, 10, 1),
(20, '123', '123', 123, 123, 1),
(21, '456', '456', 456, 456, 1),
(18, '【蘿拉手工果醬】葡萄果醬+紅豆牛奶抹醬(各1瓶)-含運費', '★商品特色\r\n葡萄果醬-\r\n粒粒黑紫玉中，融入少少清新檸檬汁，滋味甜蜜爽口，讓你有如沉浸在晨曦露水中那樣美妙滿足。\r\n\r\n紅豆牛奶抹醬-\r\n細火慢燉熬煮的紅豆，呈現綿密柔軟的觸感，搭配香', 580, 10, 1),
(19, '【新美珍】原味布丁蛋榚(5個)', '★商品特色\r\n只用蛋和鮮奶製作，不加一滴水，品質有保證，\r\n口感真的很贊，因為材料用得好，蛋榚吃起來非\r\n常的綿密水有彈性，咬下一口後，蛋榚彈性良好\r\n，還會回 復原來的形狀。\r\n', 583, 10, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `titleid` int(11) NOT NULL COMMENT '討論主題編號',
  `email` varchar(100) DEFAULT NULL COMMENT '電子郵件',
  `name` varchar(50) NOT NULL COMMENT '作者姓名',
  `subject` varchar(255) NOT NULL COMMENT '討論主題',
  `memo` text NOT NULL COMMENT '討論內容',
  `createDate` datetime DEFAULT NULL COMMENT '主題討論發起日',
  `lastNewsDate` datetime DEFAULT NULL COMMENT '主題最後討論日',
  `count` int(11) DEFAULT '0' COMMENT '參與討論數量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `titles`
--

INSERT INTO `titles` (`titleid`, `email`, `name`, `subject`, `memo`, `createDate`, `lastNewsDate`, `count`) VALUES
(1, 'prisd@prisd.com.tw', '陳桶一', 'PHP好書推薦', '「PHP與MySQL架設Windows Web資料庫實務」\r\n這是一本不錯的書籍、不知大家有沒有什麼竟見\r\n一起討論？', '2009-06-08 16:28:17', '2009-06-09 08:39:40', 1),
(2, 'ahah@yahoo.com.tw', '阿修羅', 'DevPHP好用的編輯工具', '跟大家分享一個好用的PHP編輯工具\r\nDevPHP不知各位大大有沒有什麼\r\n好的技巧可以一起分享的', '2009-06-09 07:34:16', '2009-06-09 08:53:03', 1),
(3, 'gogo199@gmail.com', '困惑的人', '什麼是變數的變數啊?', '有誰可以教教我，關於「可變的變數或是變數的變數」它到底是什麼啊？\r\n\r\n我一直搞不清楚、謝謝', '2009-06-09 07:36:51', NULL, 0),
(4, 'tom@yahoo.com.tw', '湯姆熊', 'DW與PHP', '跟大家分享一本好書\r\nPHP不知各位有沒有什麼\r\n好書可以看的', '2009-06-10 08:30:00', NULL, 0),
(5, 'alan@gmail.com', '用功的學生', '作品完成', '作業上傳完畢，\r\n\r\n謝謝', '2009-06-11 11:01:05', NULL, 0),
(6, '444@444.444', '444', '444', '444\r\n444', '2018-06-08 21:17:18', '2018-06-11 19:59:02', 2),
(7, 'aaa@444.444', 'aaa', 'aaaa', 'aaaa\r\naaa', '2018-06-11 20:02:35', '2018-06-11 20:18:51', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(20) NOT NULL COMMENT '會員帳號',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  `sex` enum('F','M') NOT NULL DEFAULT 'F' COMMENT '性別',
  `age` int(11) NOT NULL COMMENT '年齡',
  `mail` varchar(50) DEFAULT NULL COMMENT '電子郵件',
  `address` varchar(100) DEFAULT NULL COMMENT '通訊地址',
  `admin` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '管理員權限',
  `auth` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '會員是否驗證',
  `register` datetime NOT NULL COMMENT '註冊日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `password`, `sex`, `age`, `mail`, `address`, `admin`, `auth`, `register`) VALUES
('weill', 'weill', 'M', 30, 'weill@gjun.com', '台北市100公園路30號', 'Y', 'Y', '2011-06-19 02:36:56'),
('irock', 'irock', 'F', 20, 'irock@gjun.com', '台南市700中華路108號', 'N', 'Y', '2011-06-19 17:49:34'),
('alan', 'alan', 'M', 25, 'alan@gjun.com', '台中市500中正路200號', 'N', 'N', '2011-06-20 10:11:12'),
('qwe', 'qwe', 'M', 12, '12', '12', 'N', 'N', '2018-06-13 21:47:05'),
('123', '123', 'M', 123, 'mie49868@kpooa.com', '123', 'Y', 'Y', '2018-06-15 18:54:24'),
('1234', '123', 'M', 123, 'vom43957@sawoe.com', '123', 'N', 'N', '2018-06-15 20:18:43'),
('12345', '123', 'M', 123, 'lim66823@cjpeg.com', '123', 'N', 'N', '2018-06-15 20:34:02'),
('1231', '123', 'M', 123, 'rad32723@sawoe.com', '123', 'N', 'N', '2018-06-15 20:51:15'),
('1232', '123', 'M', 123, 'dev20904@mziqo.com', '123', 'N', 'N', '2018-06-15 21:03:15'),
('1233', '123', 'M', 123, 'dev20904@mziqo.com', '123', 'N', 'Y', '2018-06-15 21:12:29'),
('1235', '123', 'M', 123, 'ibh74400@mziqo.com', '123', 'N', 'N', '2018-06-15 21:23:36'),
('321', '321', 'M', 12, 'mie49868@kpooa.com', '321', 'N', 'N', '2018-06-20 21:42:05'),
('456', '456', 'M', 45, 'vdz71216@kpooa.com', '456', 'N', 'N', '2018-06-20 22:03:46');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detailsid`);

--
-- 資料表索引 `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`serial`);

--
-- 資料表索引 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `O_id` (`O_id`,`D_pid`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `details`
--
ALTER TABLE `details`
  MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT COMMENT '討論內容編號', AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;
--
-- 使用資料表 AUTO_INCREMENT `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單細目編號', AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `O_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單主檔編號', AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '產品編號', AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `titles`
--
ALTER TABLE `titles`
  MODIFY `titleid` int(11) NOT NULL AUTO_INCREMENT COMMENT '討論主題編號', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
