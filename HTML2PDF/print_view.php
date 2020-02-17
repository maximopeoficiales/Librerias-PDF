<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
<title>Document</title>
</head>

<body>
    <?php
    if ($_POST['titulo']) {
       $template= '
       <H1>'. $_POST['titulo'].'</H1>
       ';
       print($template);
    }
    
    ?>
    <h2>hola que tal bro</h2>
    
</body>
</html>