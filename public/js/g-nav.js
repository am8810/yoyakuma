$(".openbtn").click(function () {//ボタンがクリックされたら
	$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#navbarSupportedContent").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
});

$(".close-link a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#navbarSupportedContent").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
});