$(".hover img").removeClass("no-js");
$(".title, .sub-title").hide();

$(".hover img").hover(
	function () {
		$(this).next().show(200);
		$(this).next().next().show(200);
	},
	function () {
		$(this).next().hide(200);
		$(this).next().next().hide(200);
	}
);