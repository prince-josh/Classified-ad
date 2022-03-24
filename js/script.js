$(".message-seller .form").hide();
/* 1. PRELOADER JS */

		$(window).on('load', function () {
			function fadeOut(el) {
				el.style.opacity = 0.4;
				var last;
				var tick = function () {
					el.style.opacity = +el.style.opacity - (new Date() - last) / 600;
					last = +new Date();
					if (+el.style.opacity > 0) {
						(window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 100);
					} else {
						el.style.display = "none";
					}
				};
				tick();
			}
			var pagePreloaderId = document.getElementById("page-preloader");
			setTimeout(function () {
				fadeOut(pagePreloaderId)
			}, 1000);
		});
$('document').ready(function(){

  $('.eye').click(function () {
    var pass = document.getElementById('pass');
    var see = document.getElementById('see');
    var blind = document.getElementById('blind');
    if (pass.type == "password") {
      pass.type = "text";
      see.style.display = "none";
      blind.style.display = "inline";
    } 
    else if (pass.type == "text") {
      pass.type = "password";
      blind.style.display = "none";
      see.style.display = "inline";
    } 
  })

  //get product info
  // $.ajax({
  //     url:'product-details.php',
  //     dataType: "html",
  //     success: function(result){
  //         $('#ad-list').html(result)
  //     }
  //     })
  //show more products
  var commentCount = 20;
  $("#show-more").on("click", function (event) {
     event.preventDefault();
    commentCount += 20;
    $('#ad-list').load('product-details.php',{
      newCommentCount:commentCount
    })
    // event.preventDefault();
    // $.ajax({
    // newCommentCount: commentCount,
    // url:'product-details.php',
    // dataType: "html",
    // success: function(result){
    //     $('#ad-list').html(result)
    // }
    // }) 
  })
  
  $(".form-toggler").click(function(){
    $(".message-seller .form").toggle(500);
  });
});