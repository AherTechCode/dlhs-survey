<?php


    require 'db.php';
    require 'renderer.php';

    $db = new DbHandlers();
    $dl = new renderer();

    function getQuestions($NumRow = 20, $page = 1) {
        global $db, $dl;
        $offset = ($page - 1) * $NumRow;
        $count_query = "select count(*) from questions";
        $query = "select * from questions limit $NumRow offset $offset";
        
        $data = $db->getRowAssoc($query);
        $count = $db->getRows($count_query)[0][0];
        
        return [$dl->render('json', $data, null), $count];
    }

    function getStudents($NumRow = 20, $page = 1, $targ = 1, $campus_id) {
        global $db, $dl;
        $offset = ($page - 1) * $NumRow;
        $count_query = "select count(*) from users where campus_id='$campus_id'";
        $query = "select * from users where targets_id = '$targ' AND campus_id='$campus_id' limit $NumRow offset $offset ";
        
        $data = $db->getRowAssoc($query);
        $count = $db->getRows($count_query)[0][0];
        
        return [$dl->render('json', $data, null), $count];
    }

    function getQuestion($client_id) {
        global $db, $dl;
        $query = "select * from questions where id='$client_id'";
        $data = $db->getRowAssoc($query);
        return $dl->render('json', $data, null);
    }

    function getStudent($client_id) {
        global $db, $dl;
        $query = "select * from users where id='$client_id'";
        $data = $db->getRowAssoc($query);
        return $dl->render('json', $data, null);
    }