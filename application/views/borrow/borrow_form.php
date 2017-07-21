<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrow Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
      echo $this->session->userdata('sess_student_id');
      echo $this->session->userdata('sess_name');
      echo nbs();
      echo $this->session->userdata('sess_surename');
    ?>
    <hr>
    <?php
      $data=array(
        'autofocus'=>'autofocus',
        'name'=>'book_id'
      );

      echo form_open('borrow/index');
      echo form_label('Book Barcode', 'book_id');
      echo form_input($data);
      echo form_submit('submit', 'Submit');
      echo form_reset('clear', 'Clear');
      echo form_close();
    ?>
    <hr>
    <table class="table table-bordered table-striped">
      <tr>
        <td>รหัสหนังสือ</td>
        <td>ชื่อหนังสือ</td>
        <td>วันที่ยืม</td>
        <td>ระยะเวลายืมได้</td>
        <td>วันที่ต้องคืน</td>
      </tr>
      <?php
        foreach ($result as $row) {
          echo "<tr>";
          echo "<td>".$row->book_id."</td>";
          echo "<td>".$row->book_name."</td>";
          echo "<td>".$row->borrow_date."</td>";
          echo "<td>".$row->limit_date."</td>";
          echo "<td>".$row->will_return_date."</td>";
          echo "</tr>";
        }
      ?>
  </table>
  </body>
</html>
