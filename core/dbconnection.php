<?php
class DbConnection extends PDO
{
  public function __construct($file = 'config.ini')
  {
    if (!$settings = parse_ini_file(dirname(__DIR__) . '/' . $file, TRUE)) {
      throw new exception('Unable to open ' . $file . '.');
    }
    $dns = $settings['database']['driver'] .
      ':host=' . $settings['database']['host'] .
      ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
      ';dbname=' . $settings['database']['schema'];
    parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
  }
}
?>
