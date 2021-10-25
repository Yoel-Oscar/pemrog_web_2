<?php
function creatPDOConnection() {
    $link = new PDO('mysql:host=localhost;dbname=dbpwl21', 'root', '');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $link;
}
function closePDOconnection($link) {
    $link = null;
}
// Fungsi fungsi untuk crud barang
// 1. Menampilkan semua data di dalam tabel barang
function getAllBarang() {
    $link = creatPDOConnection();
    $query = "SELECT * FROM barang";
    $result = $link->query($query);
    closePDOconnection($link);
    return $result;
}
// 2. berfungsi untuk memasukan data baru kedalam tabel barang
function addBarang($id,$nama,$stock,$harga,$supplier_id) {
    $link = creatPDOConnection();
    $query = 'INSERT INTO barang (id,nama, stock, harga, supplier_id) VALUES(?,?,?,?,?)';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR);
    $stmt->bindParam(2, $nama, PDO::PARAM_STR);
    $stmt->bindParam(3, $stock, PDO::PARAM_STR);
    $stmt->bindParam(4, $harga, PDO::PARAM_STR);
    $stmt->bindParam(5, $supplier_id, PDO::PARAM_STR);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
}
function addBarangCover($id,$nama,$stock,$harga,$photo,$supplier_id) {
    $link = creatPDOConnection();
    $query = 'INSERT INTO barang (id, nama, stock, harga, photo, supplier_id) VALUES(?,?,?,?,?,?)';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->bindParam(2, $nama, PDO::PARAM_STR);
    $stmt->bindParam(3, $stock, PDO::PARAM_STR);
    $stmt->bindParam(4, $harga, PDO::PARAM_STR);
    $stmt->bindParam(5, $photo, PDO::PARAM_STR);
    $stmt->bindParam(6, $supplier_id, PDO::PARAM_STR);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
}
// 3. berfungsi untuk memperbaharui data di tabel barang
function UpdateBarang($nama,$stock,$harga, $supplier_id, $id) {
    $link = creatPDOConnection();
    $query = 'UPDATE barang SET nama = ?, stock =?, harga = ?, supplier_id=?, WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nama, PDO::PARAM_STR);
    $stmt->bindParam(2, $stock, PDO::PARAM_INT);
    $stmt->bindParam(3, $harga, PDO::PARAM_INT);
    $stmt->bindParam(4, $supplier_id, PDO::PARAM_STR);
    $stmt->bindParam(5, $id, PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
    header('location:home_after_log.php?navito=addDataBar');
}
function UpdateBarangCover($nama,$stock,$harga,$targetFile, $supplier_id, $id) {
    $link = creatPDOConnection();
    $query = 'UPDATE barang SET nama= ?, stock=?, harga=?, photo=?, supplier_id=? WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nama, PDO::PARAM_STR);
    $stmt->bindParam(2, $stock, PDO::PARAM_STR);
    $stmt->bindParam(3, $harga, PDO::PARAM_STR);
    $stmt->bindParam(4, $targetFile, PDO::PARAM_STR);
    $stmt->bindParam(5, $supplier_id, PDO::PARAM_STR);
    $stmt->bindParam(6, $id, PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
    header('location:home_after_log.php?navito=addDataBar');
}
// 4. berfungsi untuk menghapus barang dari tabel barang
function deleteBarang($barangId) {
    $link = creatPDOConnection();
    $query = 'DELETE FROM barang WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $barangId, PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
}

// 5. berfungsi untuk mencari id barang dari tabel barang.
function idBarang($idYangDicari) {
    $link = creatPDOConnection();
    $query = 'SELECT * FROM barang WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $idYangDicari, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    closePDOconnection($link);
    return $result;
//    if ($stmt = mysqli_prepare($link, $query)) {
//        mysqli_stmt_bind_param($stmt, "i", $idYangDicari);
//        mysqli_stmt_execute($stmt) or die(mysqli_error($link));
//        mysqli_stmt_bind_result($stmt, $returnId, $returnName);
//        mysqli_stmt_fetch($stmt);
//        $qResult = array('id' => $returnId, 'name' => $returnName);
//        mysqli_stmt_close($stmt);
//    }
//    mysqli_close($link);
//    return $qResult;
}



// Fungsi fungsi untuk crud Supplier
// 1. Menampilkan semua data di dalam tabel supplier
function getAllSupplier() {
    $link = creatPDOConnection() ;
    $query = "SELECT * FROM supplier";
    $result = $link->query($query);
    closePDOconnection($link);
    return $result;
}
// 2. berfungsi untuk memasukan data baru kedalam tabel supplier
function addSupplier($id,$nama,$not_telp,$alamat) {
    $link = creatPDOConnection();
    $query = 'INSERT INTO supplier (id,nama, no_telp, alamat) VALUES(?,?,?,?)';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR);
    $stmt->bindParam(2, $nama, PDO::PARAM_STR);
    $stmt->bindParam(3, $not_telp, PDO::PARAM_STR);
    $stmt->bindParam(4, $alamat, PDO::PARAM_STR);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
}
// 3. Berfungsi untuk memperbaharui data supplier di tabel supplier
function UpdateSupplier($nama, $no_telp,$alamat,$id) {
    $link = creatPDOConnection();
    $query = 'UPDATE supplier SET nama = ?, no_telp=?, alamat=? WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nama, PDO::PARAM_STR);
    $stmt->bindParam(2, $no_telp, PDO::PARAM_STR);
    $stmt->bindParam(3, $alamat, PDO::PARAM_STR); 
    $stmt->bindParam(4, $id, PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
    header('location:home_after_log.php?navito=addDataSup');
}
// 4. Berfungsi untuk menghapus data di tabel supplier
function deleteSupplier($supplierId) {
    $link = creatPDOConnection();
    $query = 'DELETE FROM supplier WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $supplierId, PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    closePDOconnection($link);
}
// 5. Berfungsi untuk mencari id 
function idSupplier($idYangDicari) {
    $link = creatPDOConnection();
    $query = 'SELECT * FROM supplier WHERE id = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $idYangDicari, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    closePDOconnection($link);
    return $result;
//    if ($stmt = mysqli_prepare($link, $query)) {
//        mysqli_stmt_bind_param($stmt, "i", $idYangDicari);
//        mysqli_stmt_execute($stmt) or die(mysqli_error($link));
//        mysqli_stmt_bind_result($stmt, $returnId, $returnName);
//        mysqli_stmt_fetch($stmt);
//        $qResult = array('id' => $returnId, 'name' => $returnName);
//        mysqli_stmt_close($stmt);
//    }
//    mysqli_close($link);
//    return $qResult;
}
function login($username, $password) {
    $link = creatPDOConnection();
    $query = 'SELECT username FROM user WHERE username = ? AND password = ? LIMIT 1';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $stmt->bindParam(2, $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    closePDOconnection($link);
    return $result;
}


