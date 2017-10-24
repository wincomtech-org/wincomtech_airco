$(document).ready(function(){
	// m_nav
	var m_cont=$(".m_cont");
	m_cont.hide();
	$(".menu").click(function(){
		if(m_cont.is(":hidden")){
			m_cont.fadeIn();
		}
	});
	m_cont.click(function(){		
		if(m_cont.is(":visible")){
			m_cont.fadeOut();
		}
	})
	// product tab
	$(".product").hide().first().fadeIn();
	$(".tab span").first().addClass("current");
	$(".tab span").click(function(){
		$(this).addClass("current").siblings().removeClass("current");
		var suoyin=$(this).index();
		$(".product").hide();
		$(".product").eq(suoyin).fadeIn();
	});
	// page product
	$(".hover_cont").hide();
	$(".page_product li").mouseenter(function(){
		$(this).find(".hover_cont").slideDown("fast");
	});	
	$(".page_product li").mouseleave(function(){
		$(this).find(".hover_cont").slideUp("fast");
	});
});