<?php
session_start();
error_reporting(0);
$con = new mysqli("[DB_HOST]", "[DB_USER]", "[DB_PASSWORD]", "[DB_NAME]");
if ($con->connect_error) {
    die("Connection failed");
}

// Backward-compat wrappers so existing code keeps working without modification
if (!function_exists('mysql_query')) {
    function mysql_query($sql, $conn = null) {
        global $con;
        $c = $conn ?: $con;
        return $c->query($sql);
    }
}
if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $type = MYSQLI_BOTH) {
        return $result ? $result->fetch_array($type) : false;
    }
}
if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result) {
        return $result ? $result->fetch_assoc() : false;
    }
}
if (!function_exists('mysql_fetch_row')) {
    function mysql_fetch_row($result) {
        return $result ? $result->fetch_row() : false;
    }
}
if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result) {
        return $result ? $result->num_rows : 0;
    }
}
if (!function_exists('mysql_affected_rows')) {
    function mysql_affected_rows($conn = null) {
        global $con;
        return ($conn ?: $con)->affected_rows;
    }
}
if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($str, $conn = null) {
        global $con;
        return ($conn ?: $con)->real_escape_string($str);
    }
}
if (!function_exists('mysql_error')) {
    function mysql_error($conn = null) {
        global $con;
        return ($conn ?: $con)->error;
    }
}
if (!function_exists('mysql_close')) {
    function mysql_close($conn = null) {
        global $con;
        return ($conn ?: $con)->close();
    }
}
if (!function_exists('mysql_insert_id')) {
    function mysql_insert_id($conn = null) {
        global $con;
        return ($conn ?: $con)->insert_id;
    }
}
if (!function_exists('mysql_connect')) {
    function mysql_connect($host = '', $user = '', $pass = '') {
        global $con;
        return $con;
    }
}
if (!function_exists('mysql_select_db')) {
    function mysql_select_db($db, $conn = null) {
        return true;
    }
}

// Charset
$con->query("SET CHARACTER SET 'utf8'");

// Application constants
if (!defined('OWNER_COMPANY')) define('OWNER_COMPANY', '[Your Company Name]');
if (!defined('INFO_EMAIL'))    define('INFO_EMAIL',    '[your-info@example.com]');
if (!defined('WEB_SITE_URL'))  define('WEB_SITE_URL',  '[https://your-website.example.com]');
if (!defined('SUPPORT_EMAIL')) define('SUPPORT_EMAIL', '[support@example.com]');
?>
