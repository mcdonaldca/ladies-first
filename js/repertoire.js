$(".hovertitle").hide();

$(".hoverimage").mouseenter( function () {
	$(this).parent().next().show(200);
}).mouseleave( function () {
	$(this).parent().next().hide(200);
});