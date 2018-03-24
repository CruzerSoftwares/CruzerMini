<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta name="keywords" content="<?php __(META_KEYWORDS);?>">
  <meta name="description" content="<?php __(META_DESCRIPTION);?>">
  <title>404 - Page Not Found</title>
  <?php __css([
    DS.THEME_DIR.'/default/assets/css/bootstrap.min.css',
  ],false);
  ?>
</head>
<body>
  <?php include_once('_header.php');?>
  <main role="main">
    <div class="container-fluid">
        <div class="page_content">
            <div class="row">
              <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
               <h2>OOPS!</h2>
               <h2>The page you are looking for doesn't exist.</h2>
                <?php if(isset($bodyContent)) __('<p class="err">'.$bodyContent.'</p>',false);?>
                <a class="btn" href="<?php __url('');?>"> Go back to Homepage</a>
              </div>
            </div>
        </div>
    </div>
  </main>

    <?php require_once '_footer.php';?>
  </body>
</html>
