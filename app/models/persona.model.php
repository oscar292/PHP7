<?php

include_once "../config/config.php";

class Persona extends Connection
{

    //listar todas las personas
    public static function listarPersonas()
    {
        try {

            $sql  = "SELECT * FROM persona";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $error) {
            echo "Throw Error " . $error->getMessage();
        }
    }

    //obtener persona por id
    public static function obtenerPersonaId($id)
    {
        try {

            $sql  = "SELECT * FROM persona WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            echo "Throw Error " . $error->getMessage();
        }
    }

    public static function saveUsuario($data)
    {
        try {

            $sql  = "INSERT INTO persona (nombres, email, edad) VALUES(:nombres, :email, :edad)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindParam(":nombres", $data['nombres']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":edad", $data['edad']);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Throw Error " . $error->getMessage();
        }
    }


    public static function update($data)
    {
        try {

            $sql  = "UPDATE persona SET nombres=:nombres, email=:email, edad=:edad WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(":nombres", $data['nombres']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":edad", $data['edad']);
            $stmt->bindParam(":id", $data['id']);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Throw Error " . $error->getMessage();
        }
    }


    public static function eliminar($id)
    {
        try {

            $sql  = "DELETE FROM persona WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Throw Error " . $error->getMessage();
        }
    }
}
