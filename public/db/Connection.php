<?php


class Connection
{
    private static $dbname = 'try_out_2_peminjaman';
    private static $host = 'localhost';
    private static $username = 'root';
    private static $password = '';
    public static $table_name = '';
    private static $connection;
    private static $sql;
    private static $primary_key = 'id';

    public static function getConnection()
    {
        $connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
        return $connection;
    }

    public static function table($name)
    {
        self::$table_name = $name;
        $sqlToGetPrimaryKey = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = '" . self::$dbname . "' AND TABLE_NAME = '" . self::$table_name . "' AND CONSTRAINT_NAME = 'PRIMARY';";



        try {
            $connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            self::$connection = $connection;
            self::$sql = "SELECT * FROM " . self::$table_name . " ";
            $stmt = $connection->prepare($sqlToGetPrimaryKey);
            $stmt->execute();

            $primary = $stmt->fetch(PDO::FETCH_ASSOC)['COLUMN_NAME'];
            self::$primary_key = $primary;
            return new self();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function get()
    {
        $result = self::$connection->query(self::$sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function first()
    {
        $result = self::$connection->query(self::$sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function where($field, $value)
    {
        self::$sql = self::$sql . " WHERE `$field` = '$value'";
        return new self();
    }
    public function findById($id)
    {
        self::$sql = self::$sql . " WHERE `" . self::$primary_key . "` = '$id'";
        $stmt = self::$connection->prepare(self::$sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function create($data = [])
    {
        $fields = "(";
        $values = " (";

        $count = 1;
        foreach ($data as $key => $value) {
            if (count($data) == $count) {
                $fields .= "`" . $key . "`) ";
                $values .= "'" . $value . "' ) ";
            } else {
                $fields .= "`" . $key . "` ,";
                $values .= "'" . $value . "' , ";
            }
            $count++;
        }

        try {
            self::$sql = "INSERT INTO `" . self::$table_name . "` $fields VALUES $values";
            $stmt = self::$connection->prepare(self::$sql);
            $stmt->execute();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            self::$sql = "DELETE FROM `" . self::$table_name . "` WHERE `" . self::$primary_key . "` = '$id'";
            $stmt = self::$connection->prepare(self::$sql);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($data, $id)
    {
        $count = 1;
        try {
            $sql = "UPDATE `" . self::$table_name . "` SET";
            foreach ($data as $key => $value) {
                if (count($data) == $count) {
                    $sql .= " `" . $key . "` = '" . $value . "'";
                } else {
                    $sql .= " `" . $key . "` = '" . $value . "',";
                }
                $count++;
            }
            $sql .= " WHERE `" . self::$primary_key . "` = $id";
            self::$sql = $sql;
            $stmt = self::$connection->prepare(self::$sql);
            $stmt->execute();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}