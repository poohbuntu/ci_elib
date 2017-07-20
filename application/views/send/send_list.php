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
    <?php
      $total_sum=0;

      foreach ($result as $row) {
        echo $row->book_id;
        echo nbs();
        echo $row->book_name;
        echo nbs();
        echo $row->borrow_date;
        echo nbs();
        echo $row->send_date;
        echo nbs();
        echo $row->limit_date;
        echo nbs();
        echo $row->late_date;
        echo nbs();
        echo $row->fine;
        echo nbs();
        echo $row->fine_total;
        echo nbs();
        echo $row->student_id;
        echo nbs();
        echo $row->name;
        echo nbs();
        echo $row->surename;
        echo br();
        $total_sum+=$row->fine_total;
      }
    ?>
    <?php echo $total_sum;?>
  </body>
</html>
