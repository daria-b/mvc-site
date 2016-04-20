<?php

class Comment
{
    const SHOW_BY_DEFAULT = 10;

    public static function getMessages($page = 1){

        $count = self::SHOW_BY_DEFAULT;
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM messages"
            . " ORDER BY id DESC "
            . "LIMIT " . self::SHOW_BY_DEFAULT
            . " OFFSET ". $offset);

        $i = 0;
        $messages = array();
        while ($row = $result->fetch()){
            $messages[$i]['id'] = $row['id'];
            $messages[$i]['author'] = $row['author'];
            $messages[$i]['message'] = $row['message'];
            $messages[$i]['date'] = $row['date'];
            $i++;
        }

        return $messages;
    }


    public static function getAllTotalMessages()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM messages');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
}