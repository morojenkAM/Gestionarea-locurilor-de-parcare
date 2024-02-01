<!DOCTYPE html>
<html>
<head>
    <title>Adaugare Utilizator</title>
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
    <h2>Adaugare Utilizator</h2>
    <form method="post">
        <label for="NumePrenume">Nume Prenume:</label>
        <input type="text" name="NumePrenume" required>
        <br>
        <label for="Telefonul">Telefonul:</label>
        <input type="text" name="Telefonul" required>
        <br>
        <label for="Email">Email:</label>
        <input type="text" name="Email" required>
        <br>
        <label for="IDAchitare">ID Achitare:</label>
        <input type="text" name="IDAchitare" required>
        <br>
        <label for="IDAbonamente">ID Abonamente:</label>
        <input type="text" name="IDAbonamente" required>
        <br>
        <input type="submit" value="Adauga Utilizator">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $NumePrenume = $_POST["NumePrenume"];
        $Telefonul = $_POST["Telefonul"];
        $Email = $_POST["Email"];
        $IDAchitare = $_POST["IDAchitare"];
        $IDAbonamente = $_POST["IDAbonamente"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO utilizatori (NumePrenume, Telefonul, Email, IDAchitare, IDAbonamente) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("ssssi", $NumePrenume, $Telefonul, $Email, $IDAchitare, $IDAbonamente);

        if ($query->execute()) {
            // Redirecționare către pagina admin_utilizatori.php după adăugarea cu succes
            header("Location: admin_utilizatori.php");
        } else {
            if ($conn->errno == 1062) {
                echo "Eroare: ID Utilizator este duplicat. Va rugam sa incercati cu un ID Utilizator unic.";
            } else {
                echo "Eroare la adaugarea datelor de utilizator: " . $conn->error;
            }
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>
