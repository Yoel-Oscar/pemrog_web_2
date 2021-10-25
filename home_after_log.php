<?php
session_start();
include_once './db_function/db_function.php';
include_once './util/PDOUtil.php';

include_once './entity/barangModel.php';
include_once './entity/supplierModel.php';
include_once './entity/userModel.php';

include_once './dao/barangDaoImpl.php';
include_once './dao/SupplierDaoImpl.php';
include_once './dao/userDaoImpl.php';

// melakukan cek, apakah user login atau tidak
if (!isset($_SESSION['user_login'])) {
    $_SESSION['user_login'] = FALSE;
}
    header('location: index.php');

$navigation = filter_input(INPUT_GET, 'navito');
if (!isset($navigation)) {
    $navigation = 'homeAfter';
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
        <script type="text/javascript"  src="js/myjquery.js"></script>
        
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="?navito=homeAfter">Home</a></li>
                <li><a href="?navito=dataBarang">Table Barang</a></li>
                <li><a href="?navito=dataSupplier">Table Supplier</a></li>
                <li><a href="?navito=addDataBar">Data Barang</a></li>
                <li><a href="?navito=addDataSup">Data Supplier</a></li>
                <li><a href="?navito=logout">LogOut</a></li>  
            </ul>
        </nav>
        <?php
        $navigation = filter_input(INPUT_GET, "navito");
        switch ($navigation) {
            case 'homeAfter':
                include_once './welcome.php';
                break;
            case 'dataBarang':
                include_once './Barang_Page.php';
                break;
            case 'dataSupplier':
                include_once './Supplier_Page.php';
                break;
            case 'addDataBar':
                include_once './updateBarang.php';
                break;
            case 'edDataBar':
                include_once './editBar.php';
                break;
            case 'edDataSup':
                include_once './editSupp.php';
                break;
            case 'addDataSup':
                include_once './uploadSupplier.php';
                break;
			case 'logout':
                session_unset();
                session_destroy();
                header("location:index.php");
                break;
            default:
                include_once './welcome.php';
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
