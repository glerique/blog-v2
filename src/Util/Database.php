<?php

namespace App\Util;

class Database{

  protected function dbConnect()
      {
          $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'test');
          $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          return $db;
      }
}
