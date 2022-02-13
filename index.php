<?php
include_once 'check.php';
include_once 'frontend.html';

// Connection
$con = mysqli_connect("localhost", "root", "", "basesite");
mysqli_set_charset($con, "utf8");

// Chech connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['submit']))
{
    $author=$_GET['author'];
    $comment=$_GET['comment'];
    // Проверяю наличие цифр в имени автора
    $isNumber= check_for_number($author);
    
    if ($isNumber)
    {   
        echo "Недопустиые символы в поле: author";
    }
    else
    {
    // Проверяю, зполнил ли пользователь все поля
    if (!empty($author) && !empty($comment))
    {
        $query = "INSERT INTO news VALUES (NULL,'$author','$comment',NOW());";
        // print_r($query);
        // print_r($con);
        $info = mysqli_query($con, $query);
    }
    else 
    {
        echo 'Заполните все поля!';
    }
    
    }
}

?>

