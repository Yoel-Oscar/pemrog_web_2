<?php
//kode untuk menghapus data
$deleteCommand = filter_input(INPUT_GET, 'command');
if (isset($deleteCommand) && $deleteCommand == 'delete') {
    $idYangDihapus = filter_input(INPUT_GET, 'sid');
    deleteBarang($idYangDihapus);
}

$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $id = filter_input(INPUT_POST, 'txtID');
    $nama = filter_input(INPUT_POST, 'txtName1');
    $stock = filter_input(INPUT_POST, 'txtStock');
    $harga = filter_input(INPUT_POST, 'txtHarga1');
    $photo = filter_input(INPUT_POST, "fileCover");
    $supplier_id = filter_input(INPUT_POST, 'comboProgam');
    if (isset($_FILES['fileCover']['name'])) {
        $targetDirectory = 'upload/';
        $fileExtention = pathinfo($_FILES['fileCover']['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDirectory . $id . '.' . $fileExtention;
        move_uploaded_file($_FILES['fileCover']['tmp_name'], $targetFile);

        addBarangCover($id, $nama, $stock,  $harga, $targetFile, $supplier_id);
    } else {
        addBarang($id,$nama,$stock,$harga,$supplier_id);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
        <title>Pemrograman Web Lanjut</title>
        <link rel="stylesheet" href="css/jquery.dataTables.css">
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript"  src="js/jquery.dataTables.js"></script>
</head>
<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Input Data Barang</legend>
        <label form="txtNameID">Id</label>
        <input type="text" id="txtNameID1" name="txtID" autofocus="" placeholder="Id Barang"/></br>
        <label form="txtNameN">Nama</label>
        <input type="text" id="txtNameN" name="txtName1" autofocus="" placeholder="Nama Barang"/></br>
        <label form="txtStock1">Stock</label>
        <input type="textfield" id="txtStockID" name="txtStock" autofocus="" placeholder="Stock Barang"/></br>
        <label form="txtHarga1">Harga</label>
        <input type="textfield" id="txtHargaID" name="txtHarga1" autofocus="" placeholder="Harga Barang"/></br>
        <label form=="Filecover7">Photo</label>
        <input type="file" id="filecover" name="fileCover" class="form-input" accept="image/jpg,image/jpeg,image/png" ><br>
        <label form="txtHarga1">Supplier</label>
        <select name="comboProgam" id ="comboProgramID" ></br>
            <?php
            $link = mysqli_connect('localhost', 'root', '', 'dbpwl21', '3306') or die(mysqli_connect_error());
            $query = "SELECT * FROM supplier";
            if ($result = mysqli_query($link, $query)or die(mysqli_error($link))) {
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                }
            }
            mysqli_close($link);
            ?>
        </select>
        <br>
        <input type="submit" name="btnSubmit" value="Save"/>
    </fieldset>
</form>
</body>
</html>
<?php
$result = getAllBarang();
    echo'<h3> Tabel Data Barang</h3>';
    echo ' <table border="1" id="table_id" class="display">';
    echo '  <thead>';
    echo '<tr bgColor="#111f18">';
    echo ' <th>id</th>';
    echo ' <th>Photo</th>';
    echo ' <th>Nama</th>';
    echo ' <th>stock</th>';
    echo ' <th>harga</th>';
    echo ' <th>Action</th>';
    echo'</tr>';
    echo' </thead>';
    echo'<tbody>';
    foreach($result as $row) {
        echo '<tr>';
        echo'<td align="center">' . $row['id'] . '</td>';
        if (isset($row['photo'])) {
            echo'<td bgColor="#111f28"><img src="'. $row['photo'] .'" height=120, width=130 align="center" ,alt="photo" class="thumbnail" "</br></td>';
        } else {
            echo'<td>' . $row['id'] . '</td>';
        }
        echo'<td bgColor="#111f28">' . $row['nama'] . '</td>';
        echo'<td bgColor="#111f28", align="center">' . $row['stock'] . '</td>';
        echo'<td bgColor="#111f28">'.'Rp. ' . $row['harga'] . '</td>';
        echo '<td bgColor="#111f28">'. " ". '<button onClick="editBarang(' .$row['id']. ')" name="btnUpdate" value="Update"/>'."Update ".'<button onClick="deleteBarang(' .$row['id'].  ')" name="btnDelete" value="Delete"/>'."Delete ". '</td>';
        echo' </tr>';
    }
    echo ' </tbody>';
    echo ' </table>';
    echo '<br>';
echo ' </tbody>';
echo'  </table>';
?>