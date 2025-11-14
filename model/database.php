<?php
class DATABASE {
    private static $dns = "mysql:host=localhost;dbname=shop_ht;charset=utf8";
    private static $username = "root";
    private static $password = "";
    private static $db = null;

    private function __construct(){} // Không cho tạo đối tượng

    public static function connect() {
        if (!self::$db) {
            try {
                self::$db = new PDO(self::$dns, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "<p>Lỗi kết nối: " . $e->getMessage() . "</p>";
                exit();
            }
        }
        return self::$db;
    }

    public static function close() {
        self::$db = null;
    }
}
?>
