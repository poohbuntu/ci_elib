<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrow Form</title>
  </head>
  <body>
    <?php
      echo $this->session->userdata('sess_student_id');
      echo $this->session->userdata('sess_name');
      echo nbs();
      echo $this->session->userdata('sess_surename');
    ?>
    <?php
      echo $limit_book;
    ?>
    <hr>
    <?php
      echo form_open('borrow/index');
      echo form_label('Book Barcode', 'book_id');
      echo form_input('book_id');
      echo form_submit('submit', 'Submit');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
    <hr>
    <?php
      foreach ($result as $row) {
        echo $row->book_id;
        echo nbs();
        echo $row->book_name;
        echo nbs();
        echo $row->borrow_date;
        echo br();
      }
    ?>
  </body>
</html>
