<?php
$hostname='localhost';
$username='root';
$password='@ppinion_Fin_tech';
$dbname='renata_sells_app_db';
$conn=  mysql_connect($hostname,$username,$password);
if($conn)
{
    if(mysql_select_db($dbname))
    {
        //echo 'Database connected';
    }
    else
    {
        die('database problem'.mysql_error());
    }
}
else
{
    die('connection problem'.mysql_error());
}