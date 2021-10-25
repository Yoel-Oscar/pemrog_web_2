<?php

class SupplierDaoImpl{
 public function getAllSupplier() {
    $link = PDOUtil::creatPDOConnection();
    $query = "SELECT * FROM supplier";
    $result = $link->query($query);
    //pada bagian ini, dikhususkan untuk memanggil nama entitas supplier
    $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'supplierModel');
    PDOUtil::closePDOconnection($link);
    return $result;
    
 }
 public function idSupplier(supplierModel $supplier) {
    $link = PDOUtil::creatPDOConnection();
    $query = 'SELECT * FROM supplier WHERE id  = ?';
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $supplier->getId(), PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'supplier');
    $stmt->execute();
    $result = $stmt->fetch();
    PDOUtil::closePDOconnection($link);
    return $result;

}

 public function addSupplier(supplierModel $supplierModel) {
    $link = PDOUtil::creatPDOConnection();
    $query = 'INSERT INTO supplier (id,nama, no_telp, alamat) VALUES(?,?,?,?)';
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $supplierModel->getId(), PDO::PARAM_INT);
    $stmt->bindValue(2, $supplierModel->getNama(), PDO::PARAM_STR);
    $stmt->bindValue(3, $supplierModel->getNoTelp(), PDO::PARAM_STR);
    $stmt->bindValue(4, $supplierModel->getAlamat(), PDO::PARAM_STR);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    PDOUtil::closePDOconnection($link);

}
public function deleteSupplier(supplierModel $supplierModel) {
    $link = PDOUtil::creatPDOConnection();
    $query = 'DELETE FROM supplier WHERE id = ?';
    $stmt = $link->prepare($query);
     $stmt->bindValue(1, $supplierModel->getId(), PDO::PARAM_INT);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    PDOUtil::closePDOconnection($link);
}


}