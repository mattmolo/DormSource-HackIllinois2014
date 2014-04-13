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
        Your order has been processed!
        </div>
    </div>
    <div onclick="post('account.php', 'id', '<?php echo $_POST['id'] ?>')" class="Choice1" style="top: 80%; left:8%; width: 300px; height: 75px; -webkit-transform: translateX(10%);
	-moz-transform: translateX(50%);
	-ms-transform: translateX(50%);
	transform: translateX(50%);">
        <div>
                Back
        </div>
    </div>
</a>
</div>

<div class="form">
    <form style="float: left">
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
var key = <?php echo "'".$_POST["key"]."';" ?>
var firebase = new Firebase("https://quickdelivery.firebaseio.com");
var request = firebase.child('Requests/' + key);

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