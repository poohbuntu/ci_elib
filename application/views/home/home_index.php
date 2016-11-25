<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-dark bg-inverse">
      <a class="navbar-brand" href="#">Navbar</a>
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
  </body>
</html>
