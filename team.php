<?php
	require'vendor/autoload.php';
//	获取多条记录
$members = excel("member")->select();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>团队详细页</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/hread.css">
	<link rel="stylesheet" href="css/team.css">
	<style>
	.li1{text-indent: 10px;}
	.nav ul li{margin-left: 300px;}
	</style>
</head>
<body>
<div class="boa">
		<div class="box">
			<!-- 头部 -->
			<div class="hread">
				<ul>
					<li class="hreada"><a   href="index.html">首页</a></li>
					<li class="hreada"><a  href="company.html">公司</a></li>
					<li class="hreada"><a  href="case.html">案例</a></li>
					<li ><a href=""><img src="images/logo.png" alt="" style="margin-top:20px;"></a></li>
					<li class="hreada colora" style="margin-left:140px;"><a  href="team.html">团队</a></li>
					<li class="hreada"><a  href="list.html">资讯</a></li>
					<li class="hreada"><a  href="contact.html">联系</a></li>
				</ul>
			</div>
		</div>
		<!-- 轮播图 -->
		<div class="boa">
				<div class="banner">
				<img src="images/banner.png" alt="">
		</div>
		<!--  -->
		<div class="boa">
			<div class="box">
				<div class="nav">
					<ul>
						<li><a href="">团队介绍</a></li>
						<li><a href="">设计作品</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="boa">
			<div class="box">
				<div class="nav2">
				<p>所在位置:</p>
				<p><a href="">首页</a></p>
				<p>-</p>
				<p><a href="">团队</a></p>
				
				</div>
			</div>
		</div>
		<div class="boa">
			<div class="box">
				<div class="main">
					<div class="main1">
						<ul>
							<li class="li1">团队介绍</li>
						</ul>
					</div>
				</div>
				<?php foreach($members as $member):?>
				<div class="main2">
					<ul>
						<li class="p1"><img src="uploads/thumb_<?=$member['filename']?>"></li>
						<li class="p2"><?=$member['name']?></li>
						<li class="p3"><?=$member['position']?></li>
						<li class="p4"><?=$member['introduction']?></li>
					</ul>
				</div>
				<?php endforeach?>
			</div>
		</div>
		<!-- 尾部 -->

		<div class="footer">
			<div class="box">
				<ul>
					<li class="footer1"><img src="images/logo2.png" alt=""></li>
					<li class="footer2">
						<p >喜邦品牌十年深耕化妆品产业</p>
						<p>友情链接：   中国雅芳    百雀羚    自然堂    巴黎欧莱雅    谷歌</p>
						<p>广州喜邦品牌顾问&设计有限公司版权所有   粤ICP备0754673</p>
					</li>
					<li class="footer3">
						<p>E-mail: 758057640@qq.com</p>
						<p><img src="images/tel.png" alt="">全国免费咨询热线：40000-138-136</p>
						<p>地址：广州市白云区新市齐富路联富大厦6018</p>
					</li>
				</ul>	
			</div>
		</div>
</div>
</body>
</html>