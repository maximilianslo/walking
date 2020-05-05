<?php
/**
* @var string $content_view
 **/
?>

<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link rel="stylesheet" type="text/javacript" href="/build/js/jquery/jquery.js">
    <link rel="stylesheet" type="text/css" href="/build/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/build/css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="/build/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="<?echo $help_css; ?> ">
</head>
<body>
<?php
include 'application/views/header_view.php';
include 'application/views/'.$content_view;
include 'application/views/footer_view.php';
?>
</body>
</html>
