<?php
  $json = file_get_contents('https://api.venmo.com/v1/me?access_token=' . $_GET["t"]);

  echo "<html>" . PHP_EOL;
  echo '<head><script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script></head>' . PHP_EOL;
  echo "<body>" . PHP_EOL;
  echo "<script>" . PHP_EOL;
  echo 'var firebase = new Firebase("https://quickdelivery.firebaseio.com");' . PHP_EOL;
  echo "var requests = firebase.child('Users');" . PHP_EOL;
  echo "var request = requests.push(" . $json . "," . PHP_EOL;
  echo "function() {" . PHP_EOL;
  echo "window.location = '/choice.html?t=" . $_GET["t"] . "'" . PHP_EOL;
  echo "});" . PHP_EOL;
  echo "</script>" . PHP_EOL;
  echo "</body></html>";

?>
