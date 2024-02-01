<!DOCTYPE html>
<html>
<head>
<style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #ffdb4d;
            text-align: center;
        }

        h2 {
            color: #ff6b6b;
        }

        form {
            background-color: #ffffff;
            border: 2px solid #ff6b6b;
            border-radius: 10px;
            padding: 20px;
            max-width: 450px;
            margin: 0 auto;
        }

        label {
            color: #ff6b6b;
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #ff6b6b;
            border-radius: 5px;
            font-size: 16px;
            color: #ff6b6b;
        }

        input[type="submit"] {
            background-color: #ff6b6b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #ff4040;
        }
    </style>
</head>
<body>
    <h2>Adaugare Strada</h2>
    <form method="post">
        <label for="DenumireStrada">Denumire Strada:</label>
        <input type="text" name="DenumireStrada" required>
        <br>
        <label for="IDSector">ID Sector:</label>
        <input type="text" name="IDSector" required>
        <br>
        <input type="submit" value="Adauga Strada">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $DenumireStrada = $_POST["DenumireStrada"];
        $IDSector = $_POST["IDSector"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO strada (DenumireStrada, IDSector) VALUES (?, ?)");
        $query->bind_param("si", $DenumireStrada, $IDSector);

        if ($query->execute()) {
            header("Location: admin_strada.php");
        } else {
            if ($conn->errno == 1062) {
                echo "Eroare: Denumirea strazii este duplicata. Va rugam sa incercati cu o denumire unica.";
            } else {
                echo "Eroare la adaugarea strazii: " . $conn->error;
            }
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>

