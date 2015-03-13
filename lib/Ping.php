<?php

require_once dirname(__FILE__) . '/Event.php';
require_once dirname(__FILE__) . '/Database.php';

class Ping {
  public static function close() {
    header("Connection: close");
    header("Content-Length: 5");
    
    echo 'Pong!';
  }
  
  public static function auth() {
    return $_SERVER['HTTP_X_PINGED_AUTH'] === getenv('PINGED_AUTH');
  }
  
  public static function log($msg) {
    fwrite(fopen('php://stdout', 'w'), $msg . "\n");
  }
  
  public static function handle() {
    self::close();
    
    if (self::auth()) {
      new Ping\Event(Ping\Database::init(), function($id) {
        self::log('Ping #' . $id);
      });
    }
  }
}