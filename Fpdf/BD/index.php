<?php
include('conexionbd.php');
 $sqlcategorias= 'SELECT * FROM Categorias';
 $result= $conexion->query($sqlcategorias);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center">Ejemplos de Reportes PDF</h1>
        <br>
        <form action="#" method="POST" class="form-inline">
            <label for="" class="my-1 mr-2">Categoria</label>
            <Select name="cat" class="custom-select my-1 mr-sm-2" required>
                <OPTION value="">Seleccionar</OPTION>
               <?php 
                foreach ($result as $nombresCat) {
                    echo '
                    <option value='. $nombresCat['IdCategoria'] .'>'.$nombresCat['NombreC'].'</option>
                    
                    ';
                }
               ?>
            </Select>
            <button type="submit" name="mostrar" class="btn btn-primary my-1">Mostrar</button>
        </form>
    
<?php
if (isset($_POST['mostrar'])) {
    $catSeleccionada= $_POST['cat'];
    $sqlProdutos = "SELECT p.CodigoP,p.NombreP,p.Precio,c.IdCategoria FROM productos
    AS p INNER JOIN categorias AS c ON p.IdCategoria= c.IdCategoria WHERE
    c.IdCategoria = $catSeleccionada ";
    $resulProductos= $conexion->query($sqlProdutos);    

    $template= '
    <h4 class="text-center">****Lista de Productos****</h4>

    <table class="table table-hover">
        <thead>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Precio</th>
        </thead>

        <tbody>';
        while ($registro= $resulProductos->fetch_array(MYSQLI_BOTH)) {
            $template.= '
            <tr>
                <td>'.$registro ['CodigoP'].'</td>
                <td>'.$registro ['NombreP'].'</td>
                <td>'.$registro ['Precio'].'</td>
            </tr>
            ';
        }
        $conexion->close();
        $template.='</tbody>    
    </table>
        <a href="../reporteBD.php?idCat='. $catSeleccionada .'"class="btn btn-primary" target="s">
            <i class="fas fa-print"></i> Imprimir
        </a>
    </div>';

    print($template);
} else {
 /*    ECHO "error"; */
 $template= '
    <h4 class="text-center">****Lista de Productos****</h4>

    <table class="table table-hover">
        <thead>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Precio</th>
        </thead>

        <tbody>
        <tr>
            <td colspan="3">
                <div class="alert alert-danger" role="alert">No hay Datos</div>
            </td>
        </tr>
        
        </tbody>    
    </table>
    </div>';
    print($template);
}



?>

    <!-- Optional JavaScript -->
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b5b7f00aae.js" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>