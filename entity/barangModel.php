<?php

class barangModel{
    private $id;
    private $nama;
    private $stock;
    private $harga;
    private $photo;
    private $supplier_id;

    public function __construct() {
        $this->supplier_id = new supplierModel();
    }

    public function getId(){
        return $this->id;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getHarga(){
        return $this->harga;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getSupplier_id(){
        return $this->supplier_id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNama($nama){
        $this->nama = $nama;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function setharga($harga){
        $this->harga = $harga;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function setSupplier_id($supplier_id){
        $this->supplier_id = $supplier_id;
    }

    public function __set($name, $value) {
        if (!isset($this->supplier_id)) {
            $this->supplier_id = new supplierModel();
        }
        if (isset($value)) {
            switch ($name) {
                case 'id':
                    $this->supplier_id->setId($value);
                break;
                case 'nama':
                    $this->supplier_id->setNama($value);
                break;
                case 'no_telp':
                    $this->supplier_id->setNo_telp($value);
                break;
                case 'alamat':
                    $this->supplier_id->setAlamat($value);
                break;
                default :
                    break;
            }
        }


}
}