<?php
/**
 * Created By Yoel Oscar 1672063
 */

class PDOUtil {
    public static function creatPDOConnection() {
        $link = new PDO('mysql:host=localhost;dbname=dbpwl21', 'root', '');
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }

    public static function closePDOconnection(PDO $link) {
        if($link != null){
            $link = null;
        }
    }
}
