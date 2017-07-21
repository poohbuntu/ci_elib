<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
      echo $this->session->userdata('sess_send_id');
    ?>
    <?php
      $data=array(
        'autofocus'=>'autofocus',
        'name'=>'book_id'
      );
      echo form_open('send/send_book');
      echo form_label('Book Barcode', 'book_id');
      echo form_input($data);
      echo form_submit('submit', 'Submit');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
  </body>
</html>
