$(document).ready(function(){
  $("#sample1").click(function(){
    $("#sample2").hide();
    $(this).css('color', 'red');
    console.log("test");
  });
});
