<?php

namespace App;

abstract class Model
{

    public const TABLE = '';
    public $id;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        var_dump($sql);
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public static function findMultiAll($page)
    {
        $db = new Db();
        $sql = 'SELECT id, title_' . $_SESSION['lang'] .  ' as title,
        content_' . $_SESSION['lang'] . ' as content FROM '  . static::TABLE . ' LIMIT ' . $page = 10;
        //var_dump($sql);
        return $db->query(
            $sql,
            [':page' => $page],
            static::class
        );
    }

    public static function findMultiById($id)
    {
        $db = new Db();

        $sql = 'SELECT id, title_' . $_SESSION['lang'] .  ' as title,
        content_' . $_SESSION['lang'] . ' as content FROM '  . static::TABLE . ' WHERE id=:id';
        $data = $db->query(
            $sql,
            [':id' => $id],
            static::class
        );
        return $data ? $data[0] : null;
    }

    public static function findById($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query(
            $sql,
            [':id' => $id],
            static::class
        );
        return $data ? $data[0] : null;
    }

    public function insert()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = '
INSERT INTO ' . static::TABLE . ' 
    (' . implode(',', $cols) . ') 
VALUES 
    (' . implode(',', array_keys($data)) . ')
';
        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->getLastId();
    }

}