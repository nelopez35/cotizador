<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sige = "localhost";
$database_sige = "ascensor";
$username_sige = "root";
$password_sige = "";
$sige = mysqli_connect($hostname_sige, $username_sige, $password_sige,$database_sige) or trigger_error(mysql_error(),E_USER_ERROR); 

?>