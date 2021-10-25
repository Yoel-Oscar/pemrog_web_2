<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$result = getAllBarang();
    echo '<link rel="stylesheet" href="css/style.css">';
    echo '<h3 align="center"> Data Barang</h3>';
    echo '<table border="1" align="center">';
    echo '<thead>';
    echo '<tr>';
    echo ' <th bgColor="black">Id Barang</th>';
    echo ' <th bgColor="black">Photo</th>';
    echo ' <th bgColor="black"> Nama barang</th>';
    echo ' <th bgColor="black"> Stok barang</th>';
    echo'</tr>';
    echo' </thead>';
    echo'<tbody>';
    foreach($result as $row) {
        echo '<tr>';
        echo'<td align="center" bgColor="black">' . $row['id'] . '</td>';
        echo'<td align="center" bgColor="black"><img src="'. $row['photo'] .'" height=100, width=120, align="center" ,alt="cover" class="thumbnail" "</br></td>';
        echo'<td bgColor="black">' . $row['nama'] . '</td>';
        echo'<td align="center" bgColor="black">' . $row['stock'] . '</td>';
        echo' </tr>';
    }
    echo ' </tbody>';
    echo ' </table>';
    echo '<br>';

?>
</body>
</html>