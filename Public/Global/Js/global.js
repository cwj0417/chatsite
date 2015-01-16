/*这里是全局js,前台和后台都要用到的js*/

$(function(){
	var public=$('.public').val();
	//dl菜单切换加号,减号切换,后台前台都可以用哦,只要在用的dl上加.g_menu_dl这个类就可以实现切换
	$(".g_menu_dl dt").click(function(){
		var dl=$(this).parent();
		var dt_image=dl.find('dt').css('background-image');
		dl.find('dd').slideDown('fast',function(){
			dl.find('dt').css('background','url('+public+'/Global/Img/g_jia_icon.png) no-repeat left center');
		});
		if(dt_image.match(/g_jia_icon/)){
			dl.find('dd').slideDown('fast',function(){
				dl.find('dt').css('background','url('+public+'/Global/Img/g_jian_icon.png) no-repeat left center');
			});
		}else{
			dl.find('dd').slideUp('fast',function(){
				dl.find('dt').css('background','url('+public+'/Global/Img/g_jia_icon.png) no-repeat left center');
			});
		}
		dl.siblings().find('dd').slideUp();
		dl.siblings().find('dt').css('background','url('+public+'/Global/Img/g_jia_icon.png) no-repeat left center');
	});
	$(".g_menu_dl dt").first().click();
})