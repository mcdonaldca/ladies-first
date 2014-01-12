$(".lady img").removeClass("no-js");
$(".name, .title").hide();

$(".lady img").hover(
	function () {
		$(this).next().show(200);
		$(this).next().next().show(200);
	},
	function () {
		$(this).next().hide(200);
		$(this).next().next().hide(200);
	}
);