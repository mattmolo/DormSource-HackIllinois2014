<?php

$id = $_POST['id'];
$key = $_POST['key'];

?>


<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Confirm</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
        <link rel="stylesheet" type="text/css" href="css/choice.css" media="screen" title="no title"/>
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
        <div class="title_info">Are you sure you want to take this order?</div>
    </div>
 <div onclick="confirmDeliv(<?php echo "'".$key."'" ?>)" class="Choice1" style="top: 30%; width: 300px; height: 75px;">
        <div>Yes</div>
    </div>
    <div onclick="deleteKey(<?php echo "'".$key"'" ?>)" class="Choice2" style="top: 30%; width: 300px;  height: 75px;">
        <div>No</div>
    </div>
</div>

<div class="form" style="top: 34%;">
    <form style="float: left;">
        <table>
            <tr>
                <td id="cell">
                <!-- Data will be appended here. -->
                </td>
            </tr>
        </table>
    </form>
</div>


<script type="text/javascript">
var key = <?php echo "'".$key."'" ?>;
var firebase = new Firebase("https://quickdelivery.firebaseio.com");
var request = firebase.child('Requests/' + key);
var data = "";
request.once('value',
    function(dataSnapshot) {
        dataSnapshot.forEach(
            function(childSnapshot) {
                $("#cell").append(childSnapshot.name() + ": " + childSnapshot.val() + "<BR>");
            }
        );
    }
);

function confirmDeliv(key) {
    var firebase = new Firebase("https://quickdelivery.firebaseio.com");
    var req = firebase.child("Requests/" + key);
    req.child("confirmation").set("1");
    post('account.php', 'id', <?php echo "'".$id."'" ?>);
}

function deleteKey(key) {
    var firebase = new Firebase("https://quickdelivery.firebaseio.com");
    var req = firebase.child("Requests/" + key);
    req.set();
    post('account.php', 'id', <?php echo "'".$id."'" ?>);
}

</script>

<input class="account-button1" type="button" value="Back" onclick="post('account.php', 'id', '<?php echo $id ?>')">
</body>
</html>