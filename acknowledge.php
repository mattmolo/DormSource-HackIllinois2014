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
        <div class="title_info">
        Are you sure you want to take this order?
        </div>
    </div>
<a href="add.html">
    <div class="Choice1" style="top: 30%; width: 300px; height: 75px;">
        <div>
                Yes
        </div>
    </div>
</a>
<a href="requests.html">
    <div class="Choice2" style="top: 30%; width: 300px;  height: 75px;">
        <div>
        No
        </div>
    </div>
</a>
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
var key = <?php "'".echo $key."'" ?>;
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

</script>


</body>
</html>