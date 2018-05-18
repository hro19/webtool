$(function() {
	// btnAnm1 クリック時の処理
	$("#btnAnm1").click(function() {
		$("div").animate({width: "150px", height: "200px"});
	});

	// btnAnm2 クリック時の処理
	$("#btnAnm2").click(function() {
		$("div").animate(
			{width: "150px", height: "200px"},
			2000, "easeInElastic", function() {
				console.log("end");
			}
		);
	});

	// btnAnm3 クリック時の処理
	$("#btnAnm3").click(function() {
		$("div").animate(
			{width: "150px", height: "200px"},
			{duration: 2000, easing: "easeInElastic",
			 complete: function() {
				console.log("end");
			}}
		);
	});
});
