<?php

class DB extends PDO {


  private function __construct($dsn, $dbUser, $dbPwd, $options) {
    parent::__construct($dsn, $dbUser, $dbPwd, $options);
  }

  private function __clone() {}

  private static $connection = NULL;
  private static $dbHost = DB_HOST;
  private static $dbUser = DB_USER;
  private static $dbPwd = DB_PWD;
  private static $dbName = DB_NAME;
  private static $dsn;

  public static function getConnection() {
    if (!isset(self::$connection)) {
      $dsn = 'mysql:host=' . self::$dbHost . ';dbname=' . self::$dbName;
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
      $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = DB_INIT_COMMAND;
      self::$connection =
        new self($dsn, self::$dbUser, self::$dbPwd, $pdo_options);
    }
    return self::$connection;
  }


  public function select ($sqlStmt, $params) {
    
    $prepStmt = DB::getConnection()->prepare($sqlStmt);
    $prepStmt->execute($params);
    $rows = $prepStmt->fetchAll();

    return $rows;
  }

  public function insertOrUpdate ($stmts) {

    $isTransactionComplete = true;
    $dbc = DB::getConnection();
    
    $dbc->beginTransaction();
    foreach ($stmts as $stmt) {
      $prepStmt = $dbc->prepare($stmt[0]);
      if (!$prepStmt->execute($stmt[1])) {
        $isTransactionComplete = false;
        break;
      }
    }
    if ($isTransactionComplete) {
      $dbc->commit();
    } else {
      $dbc->rollBack();
    }

    return $isTransactionComplete;
  }
}

?>
