<?php
//kode untuk menghapus data
$SupplierDao = new SupplierDaoImpl();
$deleteCommand = filter_input(INPUT_GET, 'command');
    if (isset($deleteCommand) && $deleteCommand == 'delete') {
        $idYangDihapus = filter_input(INPUT_GET, 'sid');
        $delsupplier = new supplierModel();
        $delsupplier->setId($idYangDihapus);
        if (isset($idYangDihapus)) {
            $result = $SupplierDao->deleteSupplier($delsupplier);
        if ($result) {
            echo '<div>Data Has Been Deleted</div';
        } else {
            echo '<div>Failed to delete data</div>';
        }
    }
}
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $id = filter_input(INPUT_POST, 'txtId');
    $nama = filter_input(INPUT_POST, 'txtName1');
    $notelfon = filter_input(INPUT_POST, 'txtTelfonId');
    $alamat = filter_input(INPUT_POST, 'txtAlamatId');

    $tambahSupplier = new supplierModel();
    $tambahSupplier->setId($id);
    $tambahSupplier->setNama($nama);
    $tambahSupplier->setNoTelp($notelfon);
    $tambahSupplier->setAlamat($alamat);
    if($submitted){
        $result = $SupplierDao->addSupplier($tambahSupplier);
    if($result){
        echo '<div> Data has been Uploaded</div';
    } else {
        echo '<div>Data Failed to Upload</div>';
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Input Data Supplier</legend>
        <label form="txtID1">Id</label>
        <input type="text" id="txtNameID1" name="txtId" autofocus="" placeholder="Id Supplier"/></br>
        <label form="txtNameN">Nama</label>
        <input type="text" id="txtNameN" name="txtName1" autofocus="" placeholder="Nama Supplier"/></br>
        <label form="txtTelfon1">No Telefon</label>
        <input type="textfield" id="txtTelfon" name="txtTelfonId" autofocus="" placeholder="Nomor Telefon"/></br>
        <label form="txtAlamat1">Alamat</label>
        <input type="textfield" id="txtAlamat" name="txtAlamatId" autofocus="" placeholder="Alamat"/></br>
        <input type="submit" name="btnSubmit" value="Save"/>
    </fieldset>
</form>
</body>
</html>

<?php
$supplier= $SupplierDao->getAllSupplier();
    echo'<h3> Tabel Data Supplier</h3>';
    
    echo ' <table border="1"border="1" id="table_id" class="display">';
    echo '  <thead>';
    echo '<tr bgColor="#111f18">';
    echo ' <th>id</th>';
    echo ' <th>Nama</th>';
    echo ' <th>No Telf</th>';
    echo ' <th>Alamat</th>';
    echo ' <th>Action</th>';
    echo'</tr>';
    echo' </thead>';
    echo'<tbody>';
    foreach($supplier as $data) {
        echo '<tr>';
        echo'<td bgColor="#111f28"align="center">' . $data->getId().'</td>';
        echo'<td bgColor="#111f28">' . $data->getNama() . '</td>';
        echo'<td bgColor="#111f28", align="center">' . $data->getNotelp() . '</td>';
        echo'<td bgColor="#111f28">' . $data->getAlamat() .'</td>';
        echo '<td bgColor="#111f28">'." ". '<button onClick="editSupplier(' .$data->getId(). ')" name="btnUpdate" value="Update"/>'."Update ".'<button onClick="deleteSupplier(' .$data->getId().  ')" name="btnDelete" value="Delete"/>'."Delete ". '</td>';
        echo' </tr>';
    }

    echo ' </tbody>';
    echo ' </table>';
    echo '<br>';
echo ' </tbody>';
echo'  </table>';
?>