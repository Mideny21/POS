<?php

require_once "connection.php";

class ModelProducts{

    //SHOW PRODUCTS
    static public function mdlShowProducts($table, $item, $value){

        if ($item != null) {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else { 
            $stmt = Connection::connect()->prepare("SELECT * FROM $table");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
	ADDING PRODUCT
	=============================================*/
    static public function mdlAddProduct($table, $data)
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(category_id, code, description, image, stock, buying_price, selling_price) VALUES (:category_id, :code, :description, :image, :stock, :buying_price, :selling_price)");

        $stmt->bindParam(":category_id", $data["category_id"], PDO::PARAM_INT);
        $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":buying_price", $data["buying_price"], PDO::PARAM_STR);
        $stmt->bindParam(":selling_price", $data["selling_price"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

}