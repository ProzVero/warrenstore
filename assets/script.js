// Responsive Menu
$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(".multi-level-responsive-menu ul.menu1").slideToggle();
});
$("ul.menu1 >li >ul").siblings("a").prepend("<span class='arrow-bottom'></span>").addClass("slidedown");
	if (document.documentElement.clientWidth < 769) {
	jQuery("ul.menu1 >li >ul li ul").siblings("a").prepend("<span class='arrow-bottom'></span>").addClass("slidedown");
    	jQuery(".slidedown").click(function(e) {
	      	e.preventDefault();
	      	jQuery(this).siblings("ul").slideToggle();
	    });
	}
	else if(document.documentElement.clientWidth > 769){
	jQuery("ul.menu1 >li >ul li ul").siblings("a").prepend("<span class='arrow-right'></span>");
}	