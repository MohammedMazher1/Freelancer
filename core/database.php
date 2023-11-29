<?php

function db_connect($servername, $username, $password, $dbname){

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        //die("Connection failed: " . mysqli_connect_error());
        return array("status" => "error", "code" => 401, "message" => mysqli_connect_error());
    }

    return $conn;
}

function db_close($conn){

    try{
        mysqli_close($conn);
    } catch(Exception $e){
        return array("status" => "error", "code" => 402, "message" => $e->getMessage());
    }
}

// function db_execute_query($conn, $sql){
//     try{
//         $result = mysqli_query($conn, $sql);
//     }catch(Exception $e) {
//         return array("status" => "error", "code" => 403, "message" => $e->getMessage());
//     }
//     return $result;
// }
function db_execute_query($conn, $sql){
    try {
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            throw new Exception(mysqli_error($conn));
        }
    } catch (Exception $e) {
        return array("status" => "error", "code" => 403, "message" => $e->getMessage());
    }
    
    return $result;
}

function db_select($conn, $table, $columns = "*", $where = ""){

    if (is_array($columns)) {
        $columns = implode(", ", $columns);
    }

    $sql = "SELECT $columns FROM $table";

    if (is_array($where) && !empty($where)) {
        $whereClause = _buildWhereClause($conn, $where);
        $sql .= " WHERE $whereClause";
    }
    else if (!empty($where)) {
        $sql .= " WHERE $where";
    }

    try{
        $result = db_execute_query($conn, $sql);
    }catch(Exception $e){
        return array("status" => "error", "code" => 404, "message" => $e->getMessage());
    }

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function db_insert($conn, $table, $data){

    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    db_execute_query($conn, $sql);

    $result = mysqli_insert_id($conn);
    if(!$result){
        return array("status" => "error", "code" => 405, "message" => mysqli_error($conn));
    }
    return $result;
}

function db_update($conn, $table, $data, $where){

    $set = "";

    foreach ($data as $column => $value) {
        $set .= "$column = '$value', ";
    }

    $set = rtrim($set, ", ");

    $sql = "UPDATE $table SET $set";
    if (is_array($where) && !empty($where)) {
        $whereClause = _buildWhereClause($conn, $where);
        $sql .= " WHERE $whereClause";
    }
    else if (!empty($where)) {
        $sql .= " WHERE $where";
    }

    try{
        $result = db_execute_query($conn, $sql);
        return $result;
    }catch(Exception $e){
        return array("status" => "error", "code" => 406, "message" => $e->getMessage());
    }
}

function db_delete($conn, $table, $where){

    $sql = "DELETE FROM $table";
    if (is_array($where) && !empty($where)) {
        $whereClause = _buildWhereClause($conn, $where);
        $sql .= " WHERE $whereClause";
    }
    else if (!empty($where)) {
        $sql .= " WHERE $where";
    }
    $result = db_execute_query($conn, $sql);

    if(!$result){
        return array("status" => "error", "code" => 407, "message" => mysqli_error($conn));
    }

    return $result;
}

function _escapeValue($conn, $value) {
    return mysqli_real_escape_string($conn, $value);
}

function _buildWhereClause($conn, $where) {

    $conditions = [];

    foreach ($where as $condition) {
        $column = _escapeValue($conn, $condition['column']);
        $operator = _escapeValue($conn, $condition['operator']);
        $value = _escapeValue($conn, $condition['value']);
        $conditions[] = "$column $operator '$value'";
    }

    $out = implode(" AND ", $conditions);
    return $out;
}