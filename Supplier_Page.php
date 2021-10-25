<?php
$result = getAllSupplier();
echo'<link rel="stylesheet" href="css/style.css">';
    echo'<h3> Tabel Data Supplier</h3>';
    echo ' <table border="1"border="1" id="table_id" class="display">';
    echo '  <thead>';
    echo '<tr bgColor="#111f18">';
    echo ' <th>id</th>';
    echo ' <th>Nama</th>';
    echo ' <th>No Telf</th>';
    echo ' <th>Alamat</th>';
    echo'</tr>';
    echo' </thead>';
    echo'<tbody>';
    foreach($result as $row) {
        echo '<tr>';
        echo'<td bgColor="#111f28",align="center">' . $row['id'] .'</td>';
        echo'<td bgColor="#111f28">' . $row['nama'] . '</td>';
        echo'<td bgColor="#111f28", align="center">' . $row['no_telp'] . '</td>';
        echo'<td bgColor="#111f28">' . $row['alamat'] .'</td>';
        echo' </tr>';
    }
    echo ' </tbody>';
    echo ' </table>';
    echo '<br>';
echo ' </tbody>';
echo'  </table>';
?>