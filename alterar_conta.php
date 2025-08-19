<?php
try {
    $host='localhost';
    $username = 'root';
    $password = '';
    $db = 'alumbramento';
    $dbh = new PDO("mysql:host=$host;dbname=$db", $username , $password);
	
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbh->prepare('SELECT * from login');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        // escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC
        foreach($result[0] as $index=>$values) {
                echo "$index - ";
        }echo "<br>";
        
        // escrevendo resultado do SELECT
        foreach($result as $row) {
                foreach($row as $value){
                        echo "$value - ";
                }
                
        }
        $dbh = null;
} catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/><br><a href='index_logado.php'>voltar</a>";
        die();
}
?>