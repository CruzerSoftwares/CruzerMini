<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <base href="<?php echo APP_URL;?>" target="_blank">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta name="keywords" content="<?php __(META_KEYWORDS);?>">
  <meta name="description" content="<?php __(META_DESCRIPTION);?>">
  <title> <?php __(isset($pageTitle) ? $pageTitle : APP_TITLE);?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <?php __css([
    APP_URL.THEME_DIR.'/admin/css/style.css',
  ],false, 12);
  ?>  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="fullpage-container">
  
    <div id="pageContent">
      <?php echo $bodyContent;?>
    </div>
    
  <?php require_once '_footer.php';?>

  <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <?php __js([
    APP_URL.THEME_DIR.'/admin/js/init.js',
  ],false, 12);
  ?> 
  </body>
</html>
