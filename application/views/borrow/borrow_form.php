<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrow Form</title>
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
            <h1>ยืมหนังสือ</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>สมาชิก
            <?php
              echo $this->session->userdata('sess_student_id');
              echo nbs();
              echo $this->session->userdata('sess_title_name');
              echo nbs();
              echo $this->session->userdata('sess_name');
              echo nbs();
              echo $this->session->userdata('sess_surename');
              echo br();
              echo 'กลุ่ม'.nbs();
              echo $this->session->userdata('sess_status');
              echo 'ประเภท'.nbs();
              echo $this->session->userdata('sess_status_type');
              echo br();
              echo 'ยืมหนังสือได้'.nbs();
              echo $this->session->userdata('sess_status_book_day');
              echo 'วัน'.nbs().'จำนวน'.nbs();
              echo $this->session->userdata('sess_status_book_unit');
              echo 'เล่ม';
              echo br();
              echo 'ยืมCDได้'.nbs();
              echo $this->session->userdata('sess_status_cd_day');
              echo 'วัน'.nbs().'จำนวน'.nbs();
              echo $this->session->userdata('sess_status_cd_unit');
              echo 'แผ่น';
              echo br();
              echo 'ยืมสื่อสิ่งพิมพ์ได้'.nbs();
              echo $this->session->userdata('sess_status_print_day');
              echo 'วัน'.nbs().'จำนวน'.nbs();
              echo $this->session->userdata('sess_status_print_unit');
              echo 'เล่ม';
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

            echo form_open('borrow/index',$form);
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
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <caption>รายการที่ยืม</caption>
            <table class="table table-bordered table-striped">
              <tr>
                <td>รหัสหนังสือ</td>
                <td>ชื่อหนังสือ</td>
                <td>วันที่ยืม</td>
                <td>ระยะเวลายืมได้</td>
                <td>วันที่ต้องคืน</td>
                <td>สถานะการคืน</td>
              </tr>
              <?php
                foreach ($result as $row) {
                  echo "<tr>";
                  echo "<td>".$row->book_id."</td>";
                  echo "<td>".$row->book_name."</td>";
                  echo "<td>".$row->borrow_date."</td>";
                  echo "<td>".$row->limit_day."</td>";
                  echo "<td>".$row->will_return_date."</td>";
                  echo "<td>".$row->send_state."</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
