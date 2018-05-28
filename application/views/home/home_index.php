<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="http://localhost/ci_elib/assets/css/bootstrap.min.css">
    <script src="http://localhost/ci_elib/assets/js/jquery-3.min.js"></script>
    <script src="http://localhost/ci_elib/assets/js/bootstrap.min.js"></script>

    <title>Home</title>
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
    </div>
  </body>
</html>
