<?php
  $id =  $_POST['id'];
  $key = $_POST['key'];
  $json = file_get_contents('https://quickdelivery.firebaseio.com/Users/'. $id.'.json');
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Add your Request</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
        <link rel="stylesheet" type="text/css" href="nprogress/nprogress.css" media="screen" title="no title"/>
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/nprogress/nprogress.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="nav-top">
    <div onClick="login()">
        Login
    </div>
    <a href="index.html">
        <div>
            Home
        </div>
    </a>
</div>
<div class="main-background">
    <div class ="title_holder">
        <div class="title_info">
            Give this PIN to the deliverer
        </div>
    </div>
    <div class="bigText3">Please give this code to the deliverer when you recieve your food!</div>
    <?php 

    $id = $_POST['id'];
    $key = $_POST['key'];

    $requests = 'https://quickdelivery.firebaseio.com/Requests.json';
    $json = file_get_contents($requests);
    $json = json_decode($json); 
    foreach ($json as $key2 => $value) {
    $req = file_get_contents('https://quickdelivery.firebaseio.com/Requests/'.$key.'.json');
    $req = json_decode($req, true);
    if ($key2 == $key) echo '<h1>'.$req["pin"].';'
}

</div>


<input class="account-button1" type="button" value="Back" onclick="post2('account.php', 'id', '<?php echo $id ?>', 'fname', '<?php echo $name ?>')">

</body>
</html>