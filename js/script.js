$(".message-seller .form").hide();
$('document').ready(function(){
  
  $(".form-toggler").click(function(){
    $(".message-seller .form").toggle(500);
  });
});