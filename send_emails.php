<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    if(mail($email,$subject,$message)){
        $alert=1;
    }else{
      $alert=2;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Email Sender</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Email Sender</h2>
  <?php
  if(isset($alert)){
    if($alert==1){
  ?>
  <div class="alert alert-success">
    <strong>Success!</strong> mail send
  </div>
  <?php
    }else{
      ?>
      <div class="alert alert-warning">
        <strong>Success!</strong> failed
      </div>
      <?php
    }
  }
  ?>
  <form action="send_emails.php" method="post">
    <div class="form-group">
      <label for="email">To Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject">
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <input type="text" class="form-control" id="message" placeholder="Enter message" name="message">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Send</button>
  </form>
</div>

</body>
</html>
