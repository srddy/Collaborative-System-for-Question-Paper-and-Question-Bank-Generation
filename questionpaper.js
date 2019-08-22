$(document).ready(function() {
  $("#subject").change(function() {
    var subject = $(this).val();
    if(subject != "") {
      $.ajax({
        url:"gettopics.php",
        data:{s_id:subject},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#topic").html(resp);
        }
      });
    } else {
      $("#topic").html("<option value=''>lol</option>");
    }
  });
});
