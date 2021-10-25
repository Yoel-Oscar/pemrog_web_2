<?php
/**
 * Created By Yoel Oscar 1672063
 * 
 */

include_once './db_function/db_function.php';
include_once './util/PDOUtil.php';

include_once './entity/barangModel.php';
include_once './entity/userModel.php';

include_once './dao/barangDaoImpl.php';
include_once './dao/userDaoImpl.php';



$navigation = filter_input(INPUT_GET, 'navito');
if (!isset($navigation)) {
    $navigation = 'home';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pemrograman Web Lanjut</title>
        <link rel="stylesheet" href="css/jquery.dataTables.css">
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript"  src="js/jquery.dataTables.js"></script>  
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="?navito=home">Home</a></li>
                <li><a href="?navito=login">Login</a></li>
            </ul>
        </nav>
        <?php
        switch ($navigation) {
            case 'home':
                include_once './home.php';
                break;
            case 'login':
                include_once './login.php';
                break;
            default:
                include_once './home.php';
                break;
        }
        ?>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#table_id').DataTable();
            });
        </script>
    </body>
</html>