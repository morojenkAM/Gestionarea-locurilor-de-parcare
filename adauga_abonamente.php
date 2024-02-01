<!DOCTYPE html>
<html>
<head>
    <title>Adaugare Abonament</title>
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
    <h2>Adaugare Abonament</h2>
    <form method="post">
        <label for="InceputAbonament">Inceput Abonament:</label>
        <input type="text" name="InceputAbonament" required>
        <br>
        <label for="SfarsitAbonament">Sfarsit Abonament:</label>
        <input type="text" name="SfarsitAbonament" required>
        <br>
        <label for="IDAchitare">ID Achitare:</label>
        <input type="text" name="IDAchitare" required>
        <br>
        <input type="submit" value="Adauga Abonament">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $InceputAbonament = $_POST["InceputAbonament"];
        $SfarsitAbonament = $_POST["SfarsitAbonament"];
        $IDAchitare = $_POST["IDAchitare"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO abonamnte (InceputAbonament, SfarsitAbonament, IDAchitare) VALUES (?, ?, ?)");
        $query->bind_param("ssi", $InceputAbonament, $SfarsitAbonament, $IDAchitare);

        if ($query->execute()) {
            // Redirecționare către pagina admin_abonamente.php după adăugarea cu succes
            header("Location: admin_abonamente.php");
        } else {
            if ($conn->errno == 1062) {
                echo "Eroare: ID Abonament este duplicat. Va rugam sa incercati cu un ID Abonament unic.";
            } else {
                echo "Eroare la adaugarea datelor de abonament: " . $conn->error;
            }
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>
