<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Check Member</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
      $data=array(
        'autofocus'=>'autofocus',
        'name'=>'student_id'
      );

      echo validation_errors();
      echo form_open('member/index2');
      echo form_label('Member Barcode', 'student_id');
      echo form_input($data);
      echo form_submit('search', 'Search');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
  </body>
</html>
