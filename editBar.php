<?php
//kode untuk eDIT
$updateCommand = filter_input(INPUT_GET, 'command');
if (isset($updateCommand) && $updateCommand == 'update') {
    $idYangDicari = filter_input(INPUT_GET, 'sid');
    $qResult = idBarang($idYangDicari);
}

//mengubahdata
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $id = $qResult['id'];
    $nama = filter_input(INPUT_POST, 'txtName1');
    $stock = filter_input(INPUT_POST, 'txtStock');
    $harga = filter_input(INPUT_POST, 'txtHarga1');
    $supplier_id = filter_input(INPUT_POST, 'comboProgam');
    if (isset($_FILES['fileCover']['name']) && !empty($_FILES['fileCover']['name'])) {
        $targetDirectory = 'upload/';
        $fileExtention = pathinfo($_FILES['fileCover']['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDirectory . $id . '.' . $fileExtention;
        move_uploaded_file($_FILES['fileCover']['tmp_name'], $targetFile);
        UpdateBarangCover($nama, $stock,$harga, $targetFile, $supplier_id, $id);
    } ELSE {
        UpdateBarang($nama, $stock, $harga,$supplier_id, $id);
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Update Data Barang</legend>
        <label form="txtNameN">Nama</label>
        <input type="text" id="txtNameN" name="txtName1" autofocus="" placeholder=<?php echo $qResult['nama'] ?>></br>
        <label form="txtStock1">Stock</label>
        <input type="textfield" id="txtStockID" name="txtStock" autofocus="" placeholder=<?php echo $qResult['stock'] ?>></br>
        <label form="txtHarga1">Harga</label>
        <input type="textfield" id="txtHargaID" name="txtHarga1" autofocus="" placeholder=<?php echo $qResult['harga'] ?> ></br>
        <label form=="Filecover7">Cover</label>
        <input type="file" id="Filecover" name="fileCover" class="form-input" accept="image/jpg,image/jpeg,image/png" value="<?php echo $qResult['photo'] ?>" ><br>
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
        <input type="submit" name="btnSubmit" value="Update"/>
    </fieldset>
</form>
</body>
</html>

