<?php
$result = getAllBarang();
echo'<link rel="stylesheet" href="css/style.css">';
    echo'<h3> Tabel Data Barang</h3>';
    echo ' <table border="1" id="table_id" class="display">';
    echo '  <thead>';
    echo '<tr bgColor="#111f18">';
    echo ' <th>id</th>';
    echo '<th>Photo</th>';
    echo ' <th>Nama</th>';
    echo ' <th>stock</th>';
    echo ' <th>harga</th>';
    echo'</tr>';
    echo' </thead>';
    echo'<tbody>';
    foreach($result as $row) {
        echo '<tr>';
        echo'<td align="center" bgColor="#111f28">' . $row['id'] . '</td>';
        echo'<td align="center" bgColor="#111f28"><img src="'. $row['photo'] .'" height=120, width=130 align="center" ,alt="cover" class="thumbnail" "</br></td>';
        echo'<td bgColor="#111f28">' . $row['nama'] . '</td>';
        echo'<td bgColor="#111f28", align="center">' . $row['stock'] . '</td>';
        echo'<td bgColor="#111f28">'.'Rp. ' . $row['harga'] . '</td>';
        echo' </tr>';
    }
    echo ' </tbody>';
    echo ' </table>';
    echo '<br>';
echo ' </tbody>';
echo'  </table>';
?>









