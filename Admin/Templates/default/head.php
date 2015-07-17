<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Flatland CMS</title>
  <meta name="viewport" content="width=device-width">

  <script src="/Admin/js/react-0.13.3/build/react.js"></script>
  <script src="/Admin/js/react-0.13.3/build/JSXTransformer.js"></script>
  <script src="/Admin/js/marked.min.js"></script>
  <link href="/Admin/css/style.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="navbar">
    <nav>
      <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="index.php?a=Page">Pages</a></li>
        <li><a href="index.php?a=Menu">Menus</a></li>
        <li><a href="index.php?a=Module">Modules</a></li>
        <li><a href="index.php?a=Image">Images</a></li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <?php if (isset($message)) { ?>
      <div class="message"><?php echo $message; ?></div>
    <?php } ?>
