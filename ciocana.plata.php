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
    <title>Ciocana,locuri de parcare cu plata</title>
</head>
<body>
<div class="image-container" id="image-container">
        <img src="ciocana_cu_plata.png" alt="Imaginea" id="image">
        <div class="label" id="label1" style="left: 58.41%; top: 6.01%;" onclick="showLabel(35, 4, 1)">1</div>
        <div class="label" id="label2" style="left: 67.9%; top: 11.5%;" onclick="showContainer2(70, 30, 2)">2</div>
        <div class="label" id="label3" style="left: 57.8%; top: 20.5%;" onclick="showContainer2(20, 30, 3)">3</div>
        <div class="label" id="label4" style="left: 56%; top: 47.4%;" onclick="showContainer2(60, 58, 4)">4</div>
        <div class="label" id="label5" style="left: 38.4%; top: 60.9%;" onclick="showContainer2(13, 68, 5)">5</div>
        <div class="label" id="label6" style="left: 38.7%; top: 65.7% ;" onclick="showContainer2(15, 70, 6)">6</div>
        <div class="label" id="label7" style="left: 54.6%; top: 88% ;" onclick="showContainer2(60, 70, 6)">7</div>
        
    </div>

    <div class="label-text-container" id="label-text-container1">
        <h1>Ion Dumeniuc 18</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="label-text-container" id="label-text-container2">
        <h1>Nicolae Milescu Spataru 15</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container3">
    <h1>Bulevardul Mircea cel Batran 32</h1>
    <div class="parking-lot">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
        <?php } ?>
    </div>
</div>

<div class="label-text-container" id="label-text-container4">
    <h1>Bulevardul Mircea cel Batran 22/5</h1>
    <div class="parking-lot">
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="parking-spot common-spot" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
        <?php } ?>
    </div>
</div>
<div class="label-text-container" id="label-text-container5">
        <h1>Mihail Sadoveanu 18</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container6">
        <h1>Mihail Sadoveanu 9</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="label-text-container" id="label-text-container7">
        <h1>Mircea cel batran 8/3</h1>
        <div class="parking-lot">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <div class="parking-spot common-spot" data-spot="<?php echo $i; ?>" onclick="showForm(<?php echo $i; ?>)"><?php echo $i; ?></div>
            <?php } ?>
        </div>
    </div>
   
    </div>
   
   
   

<!-- Adaugă altele după cum este necesar -->


    <div class="form-container" id="form-container">
        <h2>Completează datele tale</h2>
        <form id="parkingForm" onsubmit="submitForm(event)" method="POST">
            <div class="form-group">
                 <label for="NumePrenume">Nume Prenume</label>
                 <input type="NumePrenume" id="NumePrenume" name="NumePrenume" required>
            </div>

            <div class="form-group">
                    <label for="telefon">Telefon:</label>
                    <input type="tel" id="telefon" name="telefon" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <h4>Datele de pe card</h4>
            <div class="form-group">
                <label for="NumarulCardului">Numar card:</label>
                <input type="text" id="NumarulCardului" name="numeCard" required>
            </div>

            <div class="form-group">
                <label for="LunaDataExpirarii">Luna/Data/Expirarii</label>
                <input type="text" id="LunaDataExpirarii" name="LunaDataExpirarii" required>
            </div>
            <div class="form-group">
                <label for="NumelePrenumele">Numele,Prenumele:</label>
                <input type="text" id="NumelePrenumele" name="NumelePrenumele" required>
            </div>
            <div class="form-group">
                <label for="Suma">Suma:</label>
                <input type="text" id="Suma" name="Suma" required>
            </div>

            <h4>Înregistrare abonament</h4>
            <div class="form-group">
                <label for="InceputAbonament">Inceput Abonament:(de pe ce data doriti sa incepeti abonamentul)</label>
                <input type="text" id="InceputAbonament" name="InceputAbonament" required>
            </div>

            <div class="form-group">
                <label for="SfarsitAbonament">Sfarsit Abonament:(de pe ce data doriti sa finisati abonamentul)</label>
                <input type="text" id="SfarsitAbonament" name="SfarsitAbonament" required>
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
            document.getElementById('NumePrenume').value = '';
            document.getElementById('telefon').value = '';
            document.getElementById('email').value = '';
            document.getElementById('NumarulCardului').value = '';
            document.getElementById('LunaDataExpirarii').value = '';
            document.getElementById('NumelePrenumele').value = '';
            document.getElementById('Suma').value = '';
            document.getElementById('InceputAbonament').value = '';
            document.getElementById('SfarsitAbonament').value = '';
            document.getElementById('form-container').dataset.spotNumber = spotNumber;
        }

        function hideForm() {
            const formContainer = document.getElementById('form-container');
            formContainer.style.display = 'none';
        }

        function submitForm(event) {
        event.preventDefault();
        const NumePrenume = document.getElementById('NumePrenume').value;
        const telefon = document.getElementById('telefon').value;
        const email = document.getElementById('email').value;
        const NumarulCardului = document.getElementById('NumarulCardului').value;
        const LunaDataExpirarii = document.getElementById('LunaDataExpirarii').value;
        const NumelePrenumele = document.getElementById('NumelePrenumele').value;
        const Suma = document.getElementById('Suma').value;
        const InceputAbonament = document.getElementById('InceputAbonament').value;
        const SfarsitAbonament = document.getElementById('SfarsitAbonament').value;
        const spotNumber = document.getElementById('form-container').dataset.spotNumber;
        $.ajax({
            url: 'inserare_cu_plata.php',
            method: 'POST',
            data: {
                NumePrenume: NumePrenume,
                Telefonul: telefon,
                Email: email,
                NumarulCardului: NumarulCardului,
                LunaDataExpirarii: LunaDataExpirarii,
                NumelePrenumele: NumelePrenumele,
                Suma: Suma,
                InceputAbonament: InceputAbonament,
                SfarsitAbonament: SfarsitAbonament,     // Adăugați această linie pentru a transmite numărul cardului
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

        // function submitForm(event) {
        //     event.preventDefault();
        //     const NumePrenume = document.getElementById('NumePrenume').value;
        //     const Telefon = document.getElementById('telefon').value;
        //     const Email = document.getElementById('email').value;
        //     const NumarulCardului = document.getElementById('NumarulCardului').value;
        //     const LunaDataExpirarii = document.getElementById('LunaDataExpirarii').value;
        //     const NumelePrenumele = document.getElementById('NumelePrenumele').value;
        //     const InceputAbonament = document.getElementById('InceputAbonament').value;
        //     const SfarsitAbonament = document.getElementById('SfarsitAbonament').value;
        //     const spotNumber = document.getElementById('form-container').dataset.spotNumber;
        //     $.ajax({
        //         url: 'inserare_cu_plata.php',
        //         method: 'POST',
        //         data: {
        //             NumePrenume: NumePrenume,
        //             Telefon: Telefon,
        //             Email: Email,
        //             NumarulCardului: NumarulCardului,
        //             LunaDataExpirarii: LunaDataExpirarii,
        //             NumelePrenumele: NumelePrenumele,
        //             InceputAbonament: InceputAbonament,
        //             SfarsitAbonament: SfarsitAbonament,     // Adăugați această linie pentru a transmite numărul cardului
        //             spotNumber: spotNumber
        //         },
        //         success: function (response) {
        //             console.log(response);
        //             showConfirmation();

        //             // Adăugați clasa 'occupied' la elementul cu clasa 'common-spot'
        //             const spot = document.querySelector('.common-spot[data-spot="' + spotNumber + '"]');
        //             spot.classList.add('occupied');
        //         },
        //         error: function (error) {
        //             console.error('Error sending data to the server:', error);
        //         }
        //     });
        // }

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
