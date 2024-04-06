<?php

    // redirect function to take you in another page after a number of seconds

    function redirectPage ($page = NULL, $time = 0){
        if($page == 'back'){// go back to previous page
            if($_SERVER['HTTP_REFERER']){
                header("refresh:$time;url=".$_SERVER['HTTP_REFERER']);
            }
        }elseif($page){
                header("refresh:$time;url=".$page);
        }else{
            header("refresh:$time;url=index.php");
        }
        exit();
    }

    // function to create default ID

    function createID(){
        $characters = 'ABCDEFGHIGKLMNOPQRSTUVWXYZ0123456789';
        $length     = strlen($characters);
        $random     = '';
        for($i=0 ; $i < 20 ; $i++){
            $random .= $characters[mt_rand(0,$length - 1)];
        }
        return $random;
    }

    // function to set queries

    function query($type,$table,$props,$values = NULL, $wprops = NULL,$orderBy = NULL,$orderDir = 'ASC',$limit = NULL){
        // $type : to choice one of types : SELECT, INSERT , UPDATE and DELETE
        // $table: to choice the table who set query on it
        // $props: to choice COLUMN select, insert, update OR COLUMN include in WHERE clause when delete
        // $values: to give the values of $props and $wprops
        // $wprops: COLUMN include in WHERE clause . This have only AND condition.
        global $pdo;
        
        
        try{
            // SELECT Statement 
            if($type == 'select'){
                $columnSelect = '';
                foreach($props as $prop){
                    $columnSelect .= $prop.', ';
                }
                $where = NULL;
                if($wprops){
                    $where = 'WHERE ';
                    foreach($wprops as $wprop){
                        $where .= $wprop.' = ? AND '; 
                    }
                    $where = substr_replace($where,'',-4);
                }
                $order = NULL;
                if($orderBy){
                    $order = "ORDER BY $orderBy $orderDir";
                }
                if($limit){
                    $limit = "LIMIT $limit";
                }
                $columnSelect = substr_replace($columnSelect,'',-2);

                $query = $pdo->prepare("SELECT $columnSelect FROM $table $where $order $limit");

                $query->execute($values);

                return $query;
            }
            // UPDATE Statement
            elseif($type == 'update'){
                $set = 'SET ';
                foreach($props as $prop){
                    $set .= $prop.' = ?, ';
                }
                $set = substr_replace($set,' ',-2);
                $where = NULL;
                if($wprops){
                    $where = 'WHERE ';
                    foreach($wprops as $wprop){
                        $where .= $wprop.' = ? AND ';
                    }
                    $where = substr_replace($where,'',-4);
                }

                $query = $pdo->prepare("UPDATE $table $set $where");
                $query->execute($values);
                return true;
            }
            // INSERT Statement
            elseif($type == 'insert'){
                $columns = '(';
                foreach($props as $prop){
                    $columns .= $prop.',';
                }
                $columns = substr_replace($columns,') ',-1);
                $vals = 'VALUES (';
                foreach($values as $val){
                    $vals .= '?,';
                }
                $vals = substr_replace($vals,')',-1);
                
                $query = $pdo->prepare("INSERT INTO $table $columns $vals");
                $query->execute($values);
                return true;
            }
            // DELETE Statement
            elseif($type == 'delete'){
                $where = 'WHERE ';
                foreach($props as $prop){
                    $where .= $prop.'=? AND ';
                }
                $where = substr_replace($where,'',-4);

                $query = $pdo->prepare("DELETE FROM $table $where");
                $query->execute();
                return true;
            }
        }catch(PDOException $e){
            if(str_contains($e->getMessage(),'Duplicate entry')){
                if(str_contains($e->getMessage(),'Username')){
                    echo '<div class="alert alert-danger">Username has been used</div>';
                    return false;
                }if(str_contains($e->getMessage(),'Email')){
                    echo '<div class="alert alert-danger">Email has been used</div>';
                    return false;
                }
            }
        }
    }

    // function to filter input field
    // $input : it is the string value of name attribute of the input field
    // $method : it is the method of the form , get or post
    // $filter : it is the $filter of filter_var function , it has a default value as you show
    
    function filter_in($input,$method = 'post',$filter = FILTER_SANITIZE_STRING){
        $result = NULL;
        switch($filter){
            case 'email':$filter = FILTER_SANITIZE_EMAIL;break;
            case 'float':$filter = FILTER_SANITIZE_NUMBER_FLOAT;break;
            case 'int'  :$filter = FILTER_SANITIZE_NUMBER_INT;break;
            default:$filter = FILTER_SANITIZE_STRING;break;
        }
        if($method == 'get'){
            $result = isset($_GET[$input])?filter_var($_GET[$input],$filter):0;
        }else{
            $result = filter_var($_POST[$input],$filter);
        }
        return $result;
    }