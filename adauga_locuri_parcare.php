<!DOCTYPE html>
<html>
<head>
    <title>Adaugare Loc Parcare</title>
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
    <h2>Adaugare Loc Parcare</h2>
    <form method="post">
        <label for="Disponibil">Disponibil:</label>
        <input type="text" name="Disponibil" required>
        <br>
        <label for="IDParcare">ID Parcare:</label>
        <input type="text" name="IDParcare" required>
        <br>
        <label for="IDUtilizatori">ID Utilizatori:</label>
        <input type="text" name="IDUtilizatori" required>
        <br>
        <input type="submit" value="Adauga Loc Parcare">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Disponibil = $_POST["Disponibil"];
        $IDParcare = $_POST["IDParcare"];
        $IDUtilizatori = $_POST["IDUtilizatori"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO locuri_parcare (Disponibil, IDParcare, IDUtilizatori) VALUES (?, ?, ?)");
        $query->bind_param("sii", $Disponibil, $IDParcare, $IDUtilizatori);

        if ($query->execute()) {
            // Redirecționare către pagina admin_locuri_parcare.php după adăugarea cu succes
            header("Location: admin_locuri_parcare.php");
        } else {
            if ($conn->errno == 1062) {
                echo "Eroare: ID Loc este duplicat. Va rugam sa incercati cu un ID Loc unic.";
            } else {
                echo "Eroare la adaugarea datelor de loc parcare: " . $conn->error;
            }
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>
