$(".header_ul li").click(function () {
	$(this).addClass("header_ul_act").siblings().removeClass();
})

$(".header_ul_sel li").click(function () {
	$(this).addClass("header_ul_sel_act").siblings().removeClass();
})