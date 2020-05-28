<?php
function query($sql){
    /**
     * @desc 数据库查询
     * @param /查询语句sql/全局变量conn连接数据库
     * @return array
     */
    global $conn;
    $result = $conn->query($sql);
    if ($result == null) {
        echo "数据库有问题" . $sql;
    }
    return $result;
}

function select($field, $from, $where,$other="")
{
    /**
     * @desc select语句封装
     * @param /查询字段field/来源字段from/筛选字段where/可选的如order之类的[,other]
     * @demo "SELECT * FROM goods [ORDER BY add_time DESC limit 1];"
     * @return array $result
     */
    if($where!=""){
        $where = "WHERE ".$where." ";
    }
    //echo "SELECT $field FROM $from ".$where.$other;
    return query("SELECT $field FROM $from ".$where.$other);
}

function insert($table, $fields, $values,$other="")
{
    /**
     * @desc insert语句封装
     * @param /写入表table/写入字段fields/写入值values/可选的如order之类的[,other]
     * @demo "INSERT INTO goods (owner,cate,title,price,short_details,details,add_time,sell_status,img) VALUES ({$_SESSION["id"]},{$good_add_cate},'{$good_add_title}',{$good_add_price},'{$good_add_shortdetails}','{$good_add_detaials}',$good_add_time,0,'{$good_add_img}');";
     * @return array $result
     */
    return query("INSERT INTO $table ($fields) VALUES ($values) ".$other);
}

function update($table, $set, $where,$other="")
{
    /**
     * @desc update语句封装
     * @param /更新表table/设置字段$set/筛选字段where/可选的如order之类的[,other]
     * @demo "UPDATE user SET name='{$name}' , loc_province=$loc_province , loc_city=$loc_city , loc_dist=$loc_dist , loc_location='{$loc_location}' , status=$status WHERE username='{$username}';";
     * @return array $result
     */
    return query("UPDATE $table SET $set WHERE $where ".$other);
}

function toArray($result)
{
    /**
     * @desc 便于记忆的数据库查询结果转数组
     * @param /查询结果result
     * @return array
     */
    return mysqli_fetch_array($result);
}

