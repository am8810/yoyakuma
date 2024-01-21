
$(document).ready(function () {
//スムーズスクロール
$('#re-top a').click(function (){
 var speed = 500;
 var href = $(this).attr("href");
 var target = $(href == "#" || href == "" ? 'html' : href);
 var position = target.offset().top;
  $("html, body").animate({
   scrollTop: position
  }, speed, "swing");
 return false;
 });
});


$(function(){
	var topBtn = $('#re-top');
    		topBtn.hide(); //最初は非表示
    		$(window).scroll(function() {
			if ($(this).scrollTop() > 700) { //700以上、下にスクロールされた時
				topBtn.fadeIn(""); //表示
			} else { //それ意外は
				topBtn.fadeOut(""); //非表示
		}
	});
});
