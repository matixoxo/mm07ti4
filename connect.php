<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
        <title>formularz</title>
    </head>
	<body>
        <form method="post" action="connect.php">
            Data: <br> <input type="text" name="data"> <br>
            Ile osób? <br> <input type="number" name="osoby"> <br>
            Twój numer telefonu <br> <input type="text" name="tel">
            <input type="submit" value="REZERWUJ" name="btn">
        </form>
	</body>
</html>

<?php

function insert(){
    $host = 'localhost';
    $user = 'root';
    $passwd = '';
    $db_name = 'form';
    
    $conn = new mysqli($host, $user, $passwd, $db_name);
    
    if($conn->connect_error){
       echo "Nie działa";
    }

    $data = $_POST['data'];
    $osoby = $_POST['osoby'];
    $telefon = $_POST['tel'];


    $sql = "INSERT INTO tabela2 (id, dataa, ile_osob, telefon) VALUES ('','$data','$osoby','$telefon')";
    if($conn->query($sql)===TRUE){
        echo "Dodano rezerwację do bazy";
    }
    else{
        echo "Nie działa";
    }
    $conn->close();
}

if(isset($_POST['btn'])){
    insert();
}

?>