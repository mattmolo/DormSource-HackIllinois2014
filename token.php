
<?php
  $token =  htmlentities($_GET["t"]);
  $json = file_get_contents('https://api.venmo.com/v1/me?access_token=' . $token);
  echo $json;
?>


<html>
<head>
<script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
</head>
<body>
<script type="text/javascript">

var json = <?php echo $json; ?>;
var token = <?php echo $token; ?>;

var firebase = new Firebase("https://quickdelivery.firebaseio.com");
var requests = firebase.child('Users');
var request = requests.push(json,
  function() {
    //window.location = '/choice.html?t=' + token;
  });
</script>
</body></html>";