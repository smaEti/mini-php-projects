<?php

function select($table, $where = [], $select = '*', $only_one = false){
    $connection = new PDO("mysql:host=localhost;dbname=phonebook", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT {$select} FROM {$table}";
    if(!empty($where)){
        $query .= ' where ';
        $bind = [];
        foreach($where as $key => $value){
            if($key !== 0){
                if(isset($value[3])){
                    $query .= " {$value[3]} ";
                }else{
                    $query .= " and ";
                }
            }
            $query .= "{$value[0]} {$value[1]} ?";
            $bind[] = $value[2];
        }
    }
    $query = $connection->prepare($query);
    $query->execute($bind ?? null);
    $only_one ? $query = $query->fetch(PDO::FETCH_ASSOC) : $query = $query->fetchAll(PDO::FETCH_ASSOC);
    return $query;
}

function select_one($table, $where = [], $select = '*'){
    return select($table, $where, $select, true);
}

function update($table, $where = [],){
    $connection = new PDO("mysql:host=localhost;dbname=phonebook", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE {$table} SET {$value[0]}, {$value[1]}, addres=:addres";
    if(!empty($where)){
        $query .= ' where ';
        $bind = [];
        foreach($where as $key => $value){
            if($key !== 0){
                if(isset($value[3])){
                    $query .= " {$value[3]} ";
                }else{
                    $query .= " and ";
                }
            }
            $query .= "{$value[0]} {$value[1]} ?";
            $bind[] = $value[2];
        }
    }
    $query = $connection->prepare($query);
    $query->execute($bind ?? null);
    return $query;
}