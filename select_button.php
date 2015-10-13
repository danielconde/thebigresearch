
<html>
<head>
<title>A BASIC HTML FORM</title>


<?php
$servername = "localhost";
$username = "tbr_u";
$password = "tbr_99??";
$dbname = "tbr_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT r1, r2 FROM t_questions WHERE id='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        
#Almaceno las variables r1 y r2 para mostrar en los botones
$submit_post1=$row["r1"];
$submit_post2=$row["r2"];

#	echo  "Preguntas: " . $row["r1"]. " " . $row["r2"]. "<br>";
    }
} else {
    echo "0 results";
}
#$conn->close();


?>

</head>
</head>
<body>
<Form name ="form1" Method ="POST">
<Input Type = "submit" Name = "submit1" Value = "<?php echo htmlspecialchars($submit_post1); ?>">
<Input Type = "submit" Name = "submit2" Value = "<?php echo htmlspecialchars($submit_post2); ?>">
</Form>


</body>
</html>

<?php


    if (isset($_POST['submit1'])) {
    //Incrementamos la respuest
//    $sql_insert = "UPDATE `tbr_db`.`t_questions` SET `r1c` = r1c+1 WHERE `t_questions`.`id` = 1"; //No hace falta
//    $result = $conn->query($sql_insert);
    //Insertamos la respuesta del usuario
      $sql_insert_usuario = "INSERT INTO t_user(username, id_u, id_p, r1, r2, date) VALUES('usertest','u1','1','1','0', NOW())";
      $result = $conn->query($sql_insert_usuario); 
    }
    elseif (isset($_POST['submit2'])) {
      $sql_insert_usuario = "INSERT INTO t_user(username, id_u, id_p, r1, r2, date) VALUES('usertest','u1','1','0','1', NOW())";
      $result = $conn->query($sql_insert_usuario);
    }

      $sql_select_num_preguntas = "SELECT id_p FROM t_user WHERE r1 = '1' ";
      $result = $conn->query($sql_select_num_preguntas);
      $rowcount=mysqli_num_rows($result);
      printf("Resultado: %d rows",$rowcount);
?>
