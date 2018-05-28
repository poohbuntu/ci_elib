<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Check Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="http://localhost/ci_elib/assets/css/bootstrap.min.css">
    <script src="http://localhost/ci_elib/assets/js/jquery-3.min.js"></script>
    <script src="http://localhost/ci_elib/assets/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">ห้องสมุด วพ.ตร.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
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
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>ค้นหาสมาชิก</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            $data=array(
              'autofocus'=>'autofocus',
              'name'=>'student_id',
              'id'=>'student_id',
              'class'=>'form-control',
              'autocomplete'=>'off',
            );
            $form=array(
              'class'=>'form-inline',
              'autocomplete'=>'off',
            );
            $submit=array(
              'class'=>'btn btn-primary'
            );
            $clear=array(
              'class'=>'btn btn-default'
            );

            echo validation_errors();
            echo form_open('member/index2',$form);
            echo "<div class='form-group'>";
            echo form_label('Member Barcode', 'student_id');
            echo form_input($data);
            echo "</div>";
            echo form_submit('search', 'Search',$submit);
            echo form_reset('clear', 'Clear',$clear);
            echo form_close();
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
