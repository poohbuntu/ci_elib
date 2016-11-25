<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send book</title>
  </head>
  <body>
    <?php
      echo $this->session->userdata('sess_send_id');
    ?>
    <?php
      echo form_open('send/send_book');
      echo form_label('Book Barcode', 'book_id');
      echo form_input('book_id');
      echo form_submit('submit', 'Submit');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
  </body>
</html>
