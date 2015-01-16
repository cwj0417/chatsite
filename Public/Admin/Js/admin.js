/*这是后台的js*/
$(function(){
	//动态计算iframe的宽度,适应不同分辨率
	var win_w=$(window).width();//
	var a_left_w=$(".a_left").outerWidth();
	$(".a_iframe").width(win_w-a_left_w-3);

})