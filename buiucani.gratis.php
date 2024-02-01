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
    <title>Buiucani,locuri de parcare gratuita</title>
</head>
<body>
<div class="image-container" id="image-container">
        <img src="gratuita_buiucani.jpg" alt="Imaginea" id="image">
        <div class="label" id="label1" style="left: 32.65%; top: 14.95%;" onclick="showLabel(54, 11, 1)">1</div>
        <div class="label" id="label2" style="left: 20.89%; top: 22%;" onclick="showContainer2(3, 45, 2)">2</div>
        <div class="label" id="label3" style="left: 18.1%; top: 31%;" onclick="showContainer2(8, 43, 3)">3</div>
        <div class="label" id="label4" style="left: 32.65%; top: 37.09%;" onclick="showContainer2(13, 50, 4)">4</div>
        <div class="label" id="label5" style="left: 47.85%; top: 34.54%;" onclick="showContainer2(62, 30, 5)">5</div>
        <div class="label" id="label6" style="left: 49%; top: 36.89% ;" onclick="showContainer2(66, 33, 6)">6</div>
        <div class="label" id="label7" style="left: 48%; top: 39%;" onclick="showContainer2(62, 36, 7)">7</div>
        <div class="label" id="label8" style="left: 36.4%; top: 59.9%;" onclick="showContainer2(8, 70, 8)">8</div>
        <div class="label" id="label9" style="left: 36.7%; top: 76.3%;" onclick="showContainer2(19, 71, 9)">9</div>
        <div class="label" id="label10" style="left: 47.43%; top: 73.7%;" onclick="showContainer2(55, 70, 10)">10</div>
       
    </div>

    <div class="label-text-container" id="label-text-container1">
        <h1>Parcul ,,La izvor”</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="label-text-container" id="label-text-container2">
        <h1>Nicolae H.Costin 63</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container3">
    <h1>Alba Iulia 192</h1>
    <div class="parking-lot">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
        <?php } ?>
    </div>
</div>

<div class="label-text-container" id="label-text-container4">
    <h1>Ion Luca Caragiale 2</h1>
    <div class="parking-lot">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="parking-spot common-spot" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
        <?php } ?>
    </div>
</div>
<div class="label-text-container" id="label-text-container5">
        <h1>strada Ion Creangă</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container6">
        <h1>Parcare Dendrariu</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container7">
        <h1>Parcare Dendrariu</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container8">
        <h1>Piata Unirii Principatelor 1</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container9">
        <h1> str.Ghioceilor 29</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container10">
        <h1>Grigore Alexandrescu</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>

<!-- Adaugă altele după cum este necesar -->


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
