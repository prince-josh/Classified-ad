	// $(window).on('load', function () {
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
		// });
$('document').ready(function () {
    var greet = document.getElementById("greeting");
    var d = new Date();
    var h = d.getHours();
    
    if(h == 0 || h < 12){
        greet.innerHTML = "Good Morning";
    } 
    if(h == 12 || h < 16){
        greet.innerHTML = "Good Afternoon";
    } 
    else{
        greet.innerHTML = "Good Evening";
    }
    

            $('#delete').click(function(event){
                event.preventDefault();
                $.ajax({
                url:'delete.php',
                method: "get",
                data:$('form').serialize(),
                dataType: "text",
                success: function(result){
                    $('#result').html(result)
                }
            })
            })
    //get messages
  $.ajax({
    url:'messages.load.php',
    dataType: "html",
    success: function(result){
        $('#messages').html(result)
    }
    })
})