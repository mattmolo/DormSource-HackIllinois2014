<?php $id = $_POST['id'];
$name = $_POST['fname'];
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Dorm Source</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
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
        Available Deliveries:
        </div>
    </div>
</div>

<script type="text/javascript">


var firebase = new Firebase("https://quickdelivery.firebaseio.com");
var request = firebase.child('Requests/');
var userId = <?php echo $_POST['id'] ?>;

var User = firebase.child('Users/' + userId);
var UserRequests = User.child('orders/');

request.once('value',
    function(dataSnapshot) {
        dataSnapshot.forEach(
            function(childSnapshot) {
                if (childSnapshot.child("Confirmation").val() != 1) {
                $("#table").append(
                    '<tr onclick="window.location = \'acknowledge.html?key=' + childSnapshot.name() + '\';"> ' +
                    + "<td>" + childSnapshot.child("Name").val() + "</td>"
                    + "<td>" + childSnapshot.child("Name").val() + "</td>"
                    + "<td>" + childSnapshot.child("Place").val() + "</td>"
                    + "<td>" + childSnapshot.child("Note").val() + "</td>"
                    + "<td>" + childSnapshot.child("Phone").val() + "</td>"
                    + "<td>" + childSnapshot.child("Location").val() + "</td>"
                    + "<td>" + childSnapshot.child("Time").val() + "</td>"
                    + "</tr>"
                    );
                }
            }
        );
    }
);
</script>

<table id="table" class="requests">
<tr style="font-size: 25px;">
    <td width="15%">Name</td>
    <td width="15%">Place</td>
    <td width="25%">Note</td>
    <td width="15%">Phone</td>
    <td width="15%">Location</td>
    <td width="15%">Time</td>
</tr>
</table>


<input class="account-button1" type="button" value="Back" onclick="post2('account.php', 'id', '<?php echo $id ?>', 'fname', '<?php echo $name ?>')">

</body>
</html>