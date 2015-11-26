<!DOCTYPE html>
<html>
<head>
  <title>SMW:Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Web Development,CGI Design,Iphone App,Smart Phone App" />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
</head>

<body>
  <div id="bg">
    <img src="images/SMW.jpg" alt="">
  </div>

  <div class="logo">
    <a href="index.php"><img src="../image/smallworld white.png"  alt=""></a>
	</div><!-- .logo -->

	<div class="navigation">
		<ul class="navig">
			<li><a href="#demo" class="scroll hvr-shutter-out-vertical">Employer Section</a></li>
			<li><a href="../registration/login.php" class="scroll hvr-shutter-out-vertical">Candidate Login</a></li>
		</ul>
	</div>

	<div class="clearfix">
  </div>

  <div class="banner-bottom">
    <div class="fl">
      <div class="appslide">
        <figure>
					<img src="images/app-slide01.jpg" alt="">
					<img src="images/app-slide02.jpg" alt="">
					<img src="images/app-slide01.jpg" alt="">
					<img src="images/app-slide02.jpg" alt="">
					<img src="images/app-slide01.jpg" alt="">
				</figure>
			</div>


<a target="_blank" class="app-button"><img src="images/btn-1.png">
</a>
</div>

				 <div class="banner-right">
				 <h3>Dreams are extremely important.</br>
				You can’t do it unless you imagine it.</h3>
				 <p>Manage your job search with the Small World FREE jobs app and web.You can  Find, apply and manage jobs directly from your phone. With Small World, you have access to the most recent job posts at your fingertips.Using small world you can find job world wide.You can select your preferable language ,country and work type using SMW </P>
				<div class="bnr-btn">
						<a href="../registration/index.php" class="hvr-bounce-to-bottom"><img src="images/Rb.png"></a>
					</div>

				</div>
				<div class="clearfix"></div>



				 </div>


				<!-- // JS // -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/analytics-dist.js"></script>
<script src="js/jquery.bxslider-dist.js"></script>
<script src="js/kouga-dist.js"></script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/mapsetting-dist.js"></script>
<script src="js/jquery.fs.boxer.js"></script>
<script>
	$(function(){

		$('#block_mv ul').bxSlider({
			speed: 1300,
			pause: 6000,
			infiniteLoop: true,
			auto: true
		});

		$('.appslide ul').bxSlider({
			infiniteLoop: true,
			controls: false,
			auto: true,
			pager:false
		});

		$('#looper').bxSlider({
			slideMargin: 0,
	        ticker: true,
	        speed: 160000
	    });
    });
</script>
<script type="text/javascript">
    $(".boxer").boxer({
	    margin: 0,
	    fixed: true,
	    videoWidth: 1100
    });
</script>
<script>
$(function() {
  var h = $(window).height();
   $('#loader-bg ,#loader').height(h).css('display','block');
});
$(window).load(function () { //全ての読み込みが完了したら実行
  $('#loader-bg').delay(900).fadeOut(800);
  $('#loader').delay(600).fadeOut(300);
  $('#wrap').css('display', 'block');
});
//10秒たったら強制的にロード画面を非表示
$(function(){
  setTimeout('stopload()',10000);
});
function stopload(){
  $('#wrap').css('display','block');
  $('#loader-bg').delay(900).fadeOut(800);
  $('#loader').delay(600).fadeOut(300);
}
</script>
<script>

$(document).on({
	mouseenter:function(){
		$(this).find('.v')[0].play();
	},
	mouseleave:function(){
		$(this).find('.v')[0].pause();
	}
},'.cg');

</script>

</body>
</html>
