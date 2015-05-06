<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>QuickSort</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<style> 
div:nth-child(odd) {
    background: lightgrey;
}
</style>
</head>
<body>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '825202097570682',
      xfbml      : true,
      version    : 'v2.3'
    });
	FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {
		console.log('Logged in.', response);
		FB.login(function(response) {
		   console.log(response);
		   	/* make the API calls */
			FB.api('/me', function(response) {
				console.log(JSON.stringify(response));
				$('body').append('<h2>Newsfeed van '+ response.first_name +'</h2>')
			});
			FB.api(
				"/me/home",
				function (response) {
				  if (response && !response.error) {
					console.log(response);
					$.each(response.data, function() {
						var $div = '<div>';
						$.each(this, function(k, v) {
							$div += '<p>' + k + " : " + v + '</p>';
						});
						$('body').append($div + '</div>')
					});
				  }
				  else {
					console.log(response.error, response); 
				  }
				}
			);
		 }, {scope: 'read_stream'});
	  }
	  else {
		FB.login();
	  }
	});
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
