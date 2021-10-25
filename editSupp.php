<?php
//kode untuk eDIT
$updateCommand = filter_input(INPUT_GET, 'command');
if (isset($updateCommand) && $updateCommand == 'update') {
    $idYangDicari = filter_input(INPUT_GET, 'sid');
    $qResult = idSupplier($idYangDicari);
}
//mengubahdata
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $id = $qResult['id'];
    $nama = filter_input(INPUT_POST, 'txtName1');
    $no_telp = filter_input(INPUT_POST, 'txtTelfonId');
    $alamat = filter_input(INPUT_POST, 'txtAlamatId');
    UpdateSupplier($nama, $no_telp, $alamat, $id);
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
        <legend>Update Data Supplier</legend>
        <label form="txtNameN">Nama</label>
        <input type="text" id="txtNameN" name="txtName1" autofocus="" placeholder=<?php echo $qResult['nama']?>></br>
        <label form="txtTelfon1">No Telefon</label>
        <input type="textfield" id="txtTelfon" name="txtTelfonId" autofocus="" placeholder=<?php echo $qResult['no_telp']?>></br>
        <label form="txtAlamat1">Alamat</label>
        <input type="textfield" id="txtAlamat" name="txtAlamatId" autofocus="" placeholder<?php echo $qResult['alamat']?>></br>
        <input type="submit" name="btnSubmit" value="Save"/>
    </fieldset>
</form>
</body>
</html>