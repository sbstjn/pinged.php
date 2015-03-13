<?php

namespace Ping;

class Event {
  public function __construct($db, $func) {
    $this->db = $db;
    $this->parse();
    $this->build();
    $this->save($func);
  }
  
  private function build() {
    $this->data = array(
      'category'  => array_shift($this->data),
      'action'    => array_shift($this->data),
      'key'       => array_shift($this->data),
      'value'     => array_shift($this->data)
    );
  }
  
  private function query() {
    return 'INSERT INTO `asd` (' . implode('`, `', array_keys($this->data)) . "`) VALUES ('" . implode("', '", $this->data). "')";
  }
  
  private function parse() {
    $this->data = explode('/', substr($_SERVER['REQUEST_URI'], 1));
    $this->meta = json_decode($_POST['meta'], true);
  }
  
  private function save($callback) {
    $callback($this->query());
    //$callback(time());
  }
}