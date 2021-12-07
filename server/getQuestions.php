<?php


    require 'db.php';
    require 'renderer.php';

    $db = new DbHandlers();
    $dl = new renderer();

    function getQuestions(int $NumRow = 20, int $page = 1) {
        global $db, $dl;
        $offset = ($page - 1) * $NumRow;
        $count_query = "select count(*) from questions";
        $query = "select * from questions limit $NumRow offset $offset";
        
        $data = $db->getRowAssoc($query);
        $count = $db->getRows($count_query)[0][0];
        
        return [$dl->render('json', $data, null), $count];
    }

    function getStudents(int $NumRow = 20, int $page = 1, int $targ = 1) {
        global $db, $dl;
        $offset = ($page - 1) * $NumRow;
        $count_query = "select count(*) from users";
        $query = "select * from users where targets_id = '$targ' limit $NumRow offset $offset ";
        
        $data = $db->getRowAssoc($query);
        $count = $db->getRows($count_query)[0][0];
        
        return [$dl->render('json', $data, null), $count];
    }

    function getQuestion(int $client_id) {
        global $db, $dl;
        $query = "select * from questions where id='$client_id'";
        $data = $db->getRowAssoc($query);
        return $dl->render('json', $data, null);
    }

    function getStudent(int $client_id) {
        global $db, $dl;
        $query = "select * from users where id='$client_id'";
        $data = $db->getRowAssoc($query);
        return $dl->render('json', $data, null);
    }