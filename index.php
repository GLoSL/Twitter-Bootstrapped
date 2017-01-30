<?php
// get & set local time & date:
$timezone = date_default_timezone_get();
$setlocaltime = date_default_timezone_set($timezone);
$actualtime = date('m/d/Y h:i:s a', time());
// message var :
$msg = $_POST['message'];
//history from database :
$chathistory = file_get_contents("db.txt");

// Set input entry to db.txt :
if(!empty($msg)) {
  $data = $actualtime . ": " . $msg . "<br>" . "\n";
  $save = file_put_contents('db.txt', $data, FILE_APPEND | LOCK_EX);
  if($save === false) {
    echo 'There was an error writing this file';
  } else {
    echo "Send ($save bytes written to file)";
  }
}
else {
   echo 'no post data to process';
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SimplonChat</title>
  </head>
  <body>
    <div>
      <?php echo $chathistory . $data ?>
    </div>
    <form action="index.php" method="post">
      <p>
        <input autofocus="autofocus" type="text" name="message" value="" maxlength="145">
      </p>
    </form>
  </body>
</html>
