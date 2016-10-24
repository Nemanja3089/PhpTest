<?php
/**
 *  Abstract class Master is made becouse other classes can inherit this class and collect some resource from database
 */

abstract class Master
{

/**
 * This metods allUsers and save used for collect all values and insert something into the database
 */
    public static function allUsers()
    {

        $conn  = Db::getInstance();
        $query = $conn->prepare(" SELECT * FROM " . static::$table);
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        if (count($query) > 0) {
            return $query;
        }
        return false;
    }

    public function save()
    {
        $conn = Db::getInstance();

        $obj = get_object_vars($this);

        $q = "insert into " . static::$table . " (";

        foreach ($obj as $k => $v) {
            $q .= $k . ", ";
        }

        $q = rtrim($q, ", ");
        $q .= ")values(";

        foreach ($obj as $k => &$v) {
            $q .= ":" . $k . ", ";
        }
        $q = rtrim($q, ", ");
        $q .= ");";

        $query = $conn->prepare($q);

        foreach ($obj as $k => &$v) {
            $query->bindParam(":" . $k, $v);
        }
        $query->execute();
        if ($query->rowCount() > 0) {
            return $conn->lastInsertId();
        }

        return false;
    }
}
