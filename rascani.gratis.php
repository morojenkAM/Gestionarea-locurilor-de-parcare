<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .image-container {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #image {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        .label {
            position: absolute;
            background-color: rgb(234, 67, 53);
            color: rgb(234, 67, 53);
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            cursor: pointer;
        }

        .label-text-container {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px;
            border-radius: 5px;
            display: none;
            text-align: center;
            left: -100%; /* Adu containerul în afara ecranului */
            top: -100%;
        }

        .label-text {
            font-size: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .parking-lot {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .parking-spot {
            position: relative;
            height: 80px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            line-height: 80px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .parking-spot:hover {
            background-color: #45a049;
        }

        .form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            display: none;
        }

        .form-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-buttons button {
            margin: 0 10px;
        }

        .confirmation-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            display: none;
        }

        .confirmation-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .confirmation-buttons button {
            margin: 0 10px;
        }

        .confirmed {
            background-color: #45a049 !important;
        }
        .occupied {
            background-color: #ff0000 !important;
        }
    </style>
    <title>Rascani,locuri de parcare gratuita</title>
</head>
<body>
<div class="image-container" id="image-container">
        <img src="rascani_gratuita.png" alt="Imaginea" id="image">
        <div class="label" id="label1" style="left: 73.66%; top: 54.8%;" onclick="showLabel(49, 59, 1)">1</div>
        <div class="label" id="label2" style="left: 76.87%; top: 68.37%;" onclick="showContainer2(83, 71, 2)">2</div>

        
        <!-- Adăugați altele după cum este necesar -->
    </div>

    <div class="label-text-container" id="label-text-container1">
        <h1>Bulevardul Dacia 39</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="label-text-container" id="label-text-container2">
        <h1>Nicolae Dimo 11</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container3">
    <h1>Alecu Russo 2</h1>
    <div class="parking-lot">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
        <?php } ?>
    </div>
</div>






    <div class="form-container" id="form-container">
        <h2>Completează datele tale</h2>
        <form id="parkingForm" onsubmit="submitForm(event)" method="POST">
            <div class="form-group">
                <label for="numePrenume">Nume și Prenume:</label>
                <input type="text" id="numePrenume" name="numePrenume" required>
            </div>

            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-buttons">
                <button type="submit">Ocupă locul</button>
                <button type="button" onclick="hideForm()">Anulează</button>
            </div>
        </form>
    </div>

    <div class="confirmation-container" id="confirmation-container" style="border: 4px solid green;">
        <h2>Cererea ta a fost înregistrată cu succes!</h2>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
         function showLabel(left, top, labelNumber) {
            const labelTextContainer = document.getElementById('label-text-container' + labelNumber);
            hideAllLabelContainers();
            labelTextContainer.style.display = 'block';
            labelTextContainer.style.left = `calc(${left}% - 10px)`;
            labelTextContainer.style.top = `calc(${top}% - 0.00000001px)`;
        }

        function showContainer2(left, top, containerNumber) {
            const labelTextContainer = document.getElementById('label-text-container' + containerNumber);
            hideAllLabelContainers();
            labelTextContainer.style.display = 'block';
            labelTextContainer.style.left = `calc(${left}% - 50px)`;
            labelTextContainer.style.top = `calc(${top}% - 50px)`;
        }

        function hideAllLabelContainers() {
            const labelContainers = document.querySelectorAll('.label-text-container');
            labelContainers.forEach(container => {
                container.style.display = 'none';
            });
        }

        function showForm(spotNumber) {
            hideAllLabelContainers();
            const formContainer = document.getElementById('form-container');
            formContainer.style.display = 'block';
            document.getElementById('numePrenume').value = '';
            document.getElementById('telefon').value = '';
            document.getElementById('email').value = '';
            document.getElementById('form-container').dataset.spotNumber = spotNumber;
        }

        function hideForm() {
            const formContainer = document.getElementById('form-container');
            formContainer.style.display = 'none';
        }

        function submitForm(event) {
        event.preventDefault();

        const numePrenume = document.getElementById('numePrenume').value;
        const telefon = document.getElementById('telefon').value;
        const email = document.getElementById('email').value;

        $.ajax({
            url: 'inserare_utilizator.php',
            method: 'POST',
            data: {
                numePrenume: numePrenume,
                telefon: telefon,
                email: email
            },
            success: function(response) {
                // Handle the response here. Maybe show a success message to the user.
                console.log(response);
                showConfirmation();
            },
            error: function(error) {
                // Handle errors here. Maybe show an error message to the user.
                console.error('Error sending data to the server:', error);
            }
        });
    }


        function showConfirmation() {
            hideForm();
            const confirmationContainer = document.getElementById('confirmation-container');
            confirmationContainer.style.display = 'block';
        }

        function cancelConfirmation() {
            const confirmationContainer = document.getElementById('confirmation-container');
            confirmationContainer.style.display = 'none';
        }

        function resetSpot() {
            const spotNumber = document.getElementById('form-container').dataset.spotNumber;
            hideConfirmation();
            
            // TODO: Send request to reset the spot status on the server and handle the response

            // For now, just reset the color locally
            const spot = document.querySelector('.common-spot[data-spot="' + spotNumber + '"]');
            spot.classList.remove('occupied');
            spot.style.backgroundColor = '#4CAF50';
        }

        function showConfirmation() {
            hideForm();
            const confirmationContainer = document.getElementById('confirmation-container');
            confirmationContainer.style.display = 'block';
            setTimeout(() => {
                hideConfirmation();
            }, 3000); // 3000 milisecunde = 3 secunde
        }

        function hideConfirmation() {
            const confirmationContainer = document.getElementById('confirmation-container');
            confirmationContainer.style.display = 'none';
        } 

        function submitForm(event) {
            event.preventDefault();

            const numePrenume = document.getElementById('numePrenume').value;
            const telefon = document.getElementById('telefon').value;
            const email = document.getElementById('email').value;
            const spotNumber = document.getElementById('form-container').dataset.spotNumber;

            $.ajax({
                url: 'inserare_utilizator.php',
                method: 'POST',
                data: {
                    numePrenume: numePrenume,
                    telefon: telefon,
                    email: email,
                    spotNumber: spotNumber
                },
                success: function (response) {
                    console.log(response);
                    showConfirmation();

                    // Adăugați clasa 'occupied' la elementul cu clasa 'common-spot'
                    const spot = document.querySelector('.common-spot[data-spot="' + spotNumber + '"]');
                    spot.classList.add('occupied');
                },
                error: function (error) {
                    console.error('Error sending data to the server:', error);
                }
            });
        }

        function resetSpot() {
            const spotNumber = document.getElementById('form-container').dataset.spotNumber;
            hideConfirmation();

            // Eliminați clasa 'occupied' de la elementul cu clasa 'common-spot'
            const spot = document.querySelector('.common-spot[data-spot="' + spotNumber + '"]');
            spot.classList.remove('occupied');
            spot.style.backgroundColor = '#4CAF50';
        }

        /* ... Restul funcțiilor JavaScript existente ... */
    </script>
</body>
</html>
