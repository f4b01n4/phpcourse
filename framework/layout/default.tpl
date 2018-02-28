<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="user-scalable=yes">
    <title>{$appName}</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">

    <link href="{$publicUrl}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link href="{$publicUrl}/css/simple-line-icons.css" rel="stylesheet">
    <link href="{$publicUrl}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$publicUrl}/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-controller="{$controller}" data-action="{$action}">

    <div class="container">

      {include file="layout/header.tpl"}

      {$pageContent}

      {include file="layout/footer.tpl"}
      
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="{$publicUrl}/js/bootstrap.min.js"></script>
    <script src="{$publicUrl}/js/controller.js"></script>
  </body>
</html>