<?php
  $id =  $_POST['id'];
  $json = file_get_contents('https://quickdelivery.firebaseio.com/Users/'. $id.'/');
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Add your Request</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
        <link rel="stylesheet" type="text/css" href="nprogress/nprogress.css" media="screen" title="no title"/>
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="nprogress/nprogress.js"></script>
        <script type="text/javascript" src="js/main.js"></script>


</head>
<body>
<script type="text/javascript">
    console.log(<?php echo $json ?>);

</script>
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
        Add your request!
        </div>
    </div>
</div>

<div class="form">
    <form style="float: left">
        <table>
            <tr>
                <td width="25%">
                    Restaurant: <br><input id="restaurant" type="text" name="restaurant"><br>
                    Address: <br><input id="address" type="text" name="address"><br>
                </td>
                <td style="padding-left: 20px" width="50%">
                    <div class="bigTextInfo">Add what you want here. Make sure to include everything that the delivery person will need, and anything for them to be careful of(allergies.)</div><br>
                    <textarea class="bigText" id="notes" cols="80" rows="10"></textarea>
                </td>
                <td width="25%"></td>
            </tr>
                <tr>
                <td>
                <input type="button" onclick="addRequest(<?php echo $id ?>)" value="Add stuffs!">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>