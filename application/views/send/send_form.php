<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Send book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-dark bg-inverse">
            <a class="navbar-brand" href="#">ห้องสมุด วพ.ตร.</a>
            <ul class="nav navbar-nav">
              <?php
                $attributes = array(
                  'class'=>'nav-link',
                );
              ?>
              <li class="nav-item">
                <?php echo anchor('home/index', 'Home' ,$attributes); ?>
              </li>
              <li class="nav-item">
                <?php echo anchor('member/index', 'ยืมหนังสือ' ,$attributes); ?>
              </li>
              <li class="nav-item">
                <?php echo anchor('send/index', 'คืนหนังสือ' ,$attributes); ?>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>คืนหนังสือ</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>รายการที่
            <?php
              echo $this->session->userdata('sess_send_id');
            ?>
          </p>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            $data=array(
              'autofocus'=>'autofocus',
              'name'=>'book_id',
              'id'=>'book_id',
              'class'=>'form-control'
            );
            $form=array(
              'class'=>'form-inline'
            );
            $submit=array(
              'class'=>'btn btn-primary'
            );
            $clear=array(
              'class'=>'btn btn-default'
            );

            echo form_open('send/send_book',$form);
            echo "<div class='form-group'>";
            echo form_label('Book Barcode', 'book_id');
            echo form_input($data);
            echo "</div>";
            echo form_submit('submit', 'Submit',$submit);
            echo form_reset('clear', 'Clear',$clear);
            echo form_close();
          ?>
          <hr>
        </div>
      </div>
    </div>
  </body>
</html>
