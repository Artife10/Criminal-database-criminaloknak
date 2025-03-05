<style>
    body{
        text-align: center;
        background-color: black;
        color: orange;
    }
    table{
        width: 100%;
        text-align: center;
    }
    td{
        padding: 10px;
        border-style: solid;
        border-collapse: collapse;
        border-color: orange;
    }
</style>
<h1>Criminal Database</h1>
<img src="https://media.tenor.com/si84Sv6HN_kAAAAM/bruh-fatfatpankocat.gif" alt="pank">
<br>
<?php
    $conn = new mysqli(
        'localhost',
        'root',
        '',
        'felhasznalo_db'
    );

    if ($conn -> connect_error) {
        die("Hiba: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nev = $_POST["nev"];
        $email = $_POST["email"];

        echo "Név: $nev <br>";
        echo "Email: $email <br>";

        $sql = "Insert Into ugyfelek (nev, email) VALUES ('".$nev."','".$email."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Ugyes vagy";
            $sql = "SELECT * FROM ugyfelek";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                echo "
                <table>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                </tr>";
            }

            while($row = $result->fetch_assoc()){
                echo "<tr>"
                . "<td>" .$row['id'] . "</td>"
                . "<td>" .$row['nev'] . "</td>"
                . "<td>" .$row['email'] . "</td>"
                . "</tr>";
            }
            echo "<table>";
        }
        else{
            echo "Nem vagy Ugyes";
        }
    }
    else{
        echo "Hiba";
    }



?>

<a href="index.php">back</a>