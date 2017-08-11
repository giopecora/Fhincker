<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE; ?> 401</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="http:// <?php echo APP_HOST;?>/public/css/error.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="error"><?php echo $varMessage;?></h1>
    </div>
</body>
</html>