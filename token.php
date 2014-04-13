
<?php
  $token =  htmlentities($_GET["t"]);
  $json = file_get_contents('https://api.venmo.com/v1/me?access_token=' . $token);
?>


<html>
<head>
<script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<script type="text/javascript">

var json = <?php echo $json; ?>;
var token = <?php echo "'".$token."'"; ?>;


var userId = json.data.user.id;
var full_name = json.data.user.first_name + " " + json.data.user.last_name;
var email = json.data.user.email;
var phone = json.data.user.phone;
var balance = json.data.balance;

var firebase = new Firebase("https://quickdelivery.firebaseio.com");
var User = firebase.child('Users/' + userId);

User.child("full_name").set(full_name);
User.child("email").set(email);
User.child("phone").set(phone);
User.child("bal").set(balance);

post('account.php', "id", userId);

</script>
</body></html>";