<?php
require'vendor/autoload.php';

$one = excel("single")->where(["id"=>1])->find();
$two = excel("single")->where(["id"=>2])->find();
$three = excel("single")->where(["id"=>3])->find();
print_r($one);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>公司详细页</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/company.css">
	<link rel="stylesheet" href="css/hread.css">
	<style>
	.li1{text-indent: 10px;}
	.main{height: 90px;}
	</style>
</head>
<body>
<div class="boa">
		<div class="box">
			<!-- 头部 -->
			<div class="hread">
				<ul>
					<li class="hreada"><a   href="index.html">首页</a></li>
					<li class="hreada colora"><a  href="company.html">公司</a></li>
					<li class="hreada"><a  href="case.html">案例</a></li>
					<li ><a href=""><img src="images/logo.png" alt="" style="margin-top:20px;"></a></li>
					<li class="hreada" style="margin-left:140px;"><a  href="team.html">团队</a></li>
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
	<!-- 小导航栏 -->
		<div class="boa">
			<div class="box">
				<div class="nav">
					<ul>
						<li><a href="">认识喜邦</a></li>
						<li><a href="">企业文化</a></li>
						<li><a href="">企业环境</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 导航信息 -->
		<div class="boa">
			<div class="box">
				<div class="nav2">
				<p>所在位置:</p>
				<p><a href="">首页</a></p>
				<p>-</p>
				<p><a href="">公司</a></p>
			
				</div>
			</div>
		</div>
		<!-- 内容 -->
		<div class="boa" >
			<div class="box">
				<div class="main">
					<div class="main1">
						<ul>
							<li class="li1"><?=$one["title"]?></li>
							<li class="li2"><?=$one["small_title"]?></li>
						</ul>
					</div>
				</div>
				<div class="main2">
					<ul>
						<li class="p1">广州喜邦广告设计有限公司</li>
						<li class="p2">Guangzhou xiban advertising design co., LTD</li>
						<li class="p3">喜邦广告成立于2005年，公司专注于为化妆品行业客户提供品牌策略服务、平面创意表现、包装设计、终端形象设计的综合性广告平面设计喜邦广告成立于2005年，公司专注于为化妆品行业客户提供品牌策略服务、平面创意表现、包装设计、终端形象设计的</li>
					</ul>
					<ul>
						<img class="imgl" src="images/company1.png" alt="">
						<img src="images/company2.png" alt="">
						<img src="images/company3.png" alt="">
						<img src="images/company4.png" alt="">
						<img src="images/company5.png" alt="">
					</ul>
					<ul>
						<img class="imgl" src="images/company6.png" alt="">
						<img src="images/company7.png" alt="">
						<img src="images/company8.png" alt="">
						<img src="images/company9.png" alt="">
						<img src="images/company10.png" alt="">
					</ul>
				</div>
				<div class="main">
					<div class="main1" style="margin-top:50px;">
						<ul>
							<li class="li1"><?=$two['title']?></li>
							<li class="li2"><?=$two['small_title']?></li>
						</ul>
					</div>
				</div>
				<div class="main3">
					<ul>
						<li class="m3">喜邦秉承“分享”与“创造”的文化理念，为员工提供幸福感的工作，用智慧与专业为客户创造幸福感。我们拥有“用心 耐心 创意 诚意”喜邦秉承“分享”与“创造”的文化理念，为员工提供幸福感的工作，用智慧与专业为客户创造幸福感。我们拥有“用心 耐心 创意 诚意”</li>
						<li class="m32">
							<img src="images/companya.png" alt="">
							<img src="images/companyb.png" alt="">
							<img src="images/companyc.png" alt="">
							<img src="images/companyd.png" alt="">
						</li>
						<li class="m33">
							<p>用心With your heart</p>
							<p>耐心Patienec</p>
							<p>创意Creative</p>
							<p>创意Creative</p>
						</li>
					</ul>
				<div class="main">
					<div class="main1">
						<ul>
							<li class="li1"><?=$three['title']?></li>
							<li class="li2"><?=$three['small_title']?></li>
						</ul>
					</div>
				</div>	
				</div>
					<div class="main3">
					<ul>
						<li class="m3">喜邦秉承“分享”与“创造”的文化理念，为员工提供幸福感的工作，用智慧与专业为客户创造幸福感。我们拥有“用心 耐心 创意 诚意”喜邦秉承“分享”与“创造”的文化理念，为员工提供幸福感的工作，用智慧与专业为客户创造幸福感。我们拥有“用心 耐心 创意 诚意”</li>
						<li class="m32">
							<img src="images/companyaa.png" alt="">
							<img src="images/companybb.png" alt="">
							<img src="images/companycc.png" alt="">
							<img src="images/companydd.png" alt="">
						</li>
						<li class="m33">
							<p>楼梯一角</p>
							<p>项目接待室</p>
							<p>办公室一角</p>
							<p>客户接待室</p>
						</li>
					</ul>
				</div>
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