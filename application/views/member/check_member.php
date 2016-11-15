<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Check Member</title>
  </head>
  <body>
    <?php
      echo validation_errors();
      echo form_open('member/index2');
      echo form_label('Member Barcode', 'student_id');
      echo form_input('student_id');
      echo form_submit('search', 'Search');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
  </body>
</html>
