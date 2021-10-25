function deleteBarang(id) {
    var confirmation = window.confirm("Yakin Mmenghapus Barang?")
    if (confirmation) {
        //window.alert(id)
        window.location = "home_after_log.php?navito=addDataBar&command=delete&sid=" + id;
    }
}
function editBarang(id) {
    window.location = "home_after_log.php?navito=edDataBar&command=update&sid=" + id;
}

function deleteSupplier(id) {
    var confirmation = window.confirm("Yakin Menghapus Supplier ?")
    if (confirmation) {
        //window.alert(id)
        window.location = "home_after_log.php?navito=addDataSup&command=delete&sid=" + id;
    }
}
function editSupplier(id) {
    window.location = "home_after_log.php?navito=edDataSup&command=update&sid=" + id;
}
