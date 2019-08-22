<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="home.css" type="text/css">
<div id="frm-cvr" background="https://pixabay.com/en/photos/bookshelf/">
	<script>
		window.onload=function(){
  var i=0; var previous_hash = window.location.hash;
  var x = setInterval(function(){
    i++; window.location.hash = "/noop/" + i;
    if (i==10){clearInterval(x);
      window.location.hash = previous_hash;}
  },10);
}
	</script>
<div class="cl-wh" id="f-mlb">CollabQA</div>
<form method="POST" autocomplete="off">
<div id="s-btn" class="mrg25t"><input type="submit" value="Login" class="b3" formaction="login.php"></div>
<div id="s-btn" class="mrg25t"><input type="submit" value="Register" class="b3" formaction="form.php"></div>
</div>
