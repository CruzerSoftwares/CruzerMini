<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?php echo APP_URL;?>" target="_blank">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta name="keywords" content="<?php __(META_KEYWORDS);?>">
  <meta name="description" content="<?php __(META_DESCRIPTION);?>">
  <title> <?php __(isset($pageTitle) ? $pageTitle : APP_TITLE);?></title>
  <?php __css([
    APP_URL.THEME_DIR.'/default/assets/css/bootstrap.min.css',
  ],false);
  ?>
</head>
<body>
  <?php include_once('_header.php');?>
  <main role="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 blog-main">
        <?php echo $bodyContent;?>
      </div>
        <?php include_once('_sidebar.php');?>
      </div>
    </div>
  </main>
    <?php require_once '_footer.php';?>
  </body>
</html>
