<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel="stylesheet" href="<?php echo $settings->routerSettings->HTTP_HOST ?>css/bootstrap.min.css">
    <meta charset="utf-8">
    <script src="<?php echo $settings->routerSettings->HTTP_HOST ?>js/jquery-3.1.1.js"></script>
    <script src="<?php echo $settings->routerSettings->HTTP_HOST ?>js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $settings->routerSettings->HTTP_HOST ?>css/font-awesome.min.css"/>
    <link href="<?php echo $settings->routerSettings->HTTP_HOST ?>css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo $settings->routerSettings->HTTP_HOST ?>css/style.css" rel="stylesheet" media="screen">
    <link href="<?php echo $settings->routerSettings->HTTP_HOST ?>css/chosen.css" rel="stylesheet" media="screen">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<div id="loader_body">
    <div id="loader_text">
        This page is loading, please wait...
    </div>
    <div id="loader">
        <img src="<?php echo $settings->routerSettings->HTTP_HOST ?>includes/loader.gif" class="loader_img">
    </div>
</div>
<input type="hidden" id="HTTP_HOST" value="<?php echo $settings->routerSettings->HTTP_HOST ?>">
<?php include $content_view; ?>
</body>
</html>