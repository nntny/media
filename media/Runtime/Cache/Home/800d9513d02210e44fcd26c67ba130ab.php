<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>页面走丢</title>
    <link href="/project/media/Public/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
     body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    ul li {
        list-style-type: none;
    }

    i {
        font-style: normal;
    }

    .lose,
    .lose_img {
        height: 100%;
        width: 100%;
        background-image: url('/project/media/Public/images/same_content/lose.jpg');
        background-size: 100% 100%;
    }
</style>
<body>
  <div class="lose">
      <div class="lose_img">
      </div>
  </div>
    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>  
</body>
</html>