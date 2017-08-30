<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ConexionMySQL = "localhost";
$database_ConexionMySQL = "alumnos";
$username_ConexionMySQL = "root";
$password_ConexionMySQL = "";
$ConexionMySQL = mysql_pconnect($hostname_ConexionMySQL, $username_ConexionMySQL, $password_ConexionMySQL) or trigger_error(mysql_error(),E_USER_ERROR); 
?>