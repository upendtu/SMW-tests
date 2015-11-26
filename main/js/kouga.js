//AutoTargetBlank
$(function(){
     $("a[href^='http://']").attr("target","_blank");
});

//pagetop
$(function() {
	var showFlag = false;
	var topBtn = $('#state__pt');	
	topBtn.css('bottom', '-100px');
	//スクロールが300に達したらボタン表示
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			if (showFlag === false) {
				showFlag = true;
				topBtn.stop().animate({'bottom' : '80px'}, 200); 
			}
		} else {
			if (showFlag) {
				showFlag = false;
				topBtn.stop().animate({'bottom' : '-100px'}, 200); 
			}
		}
	});
	//スクロールしてトップ
    topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
    });
});


//header
$(function(){
	var nav = $('#block_header');
	var navTop = nav.offset().top;
	$(window).scroll(function () {
        var winTop = ($(this).scrollTop() > 100);
        if (winTop <= navTop) {
            nav.addClass('state_clear')
        } else if (winTop >= navTop) {
            nav.removeClass('state_clear')
        }
    });
});

