<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

    
   
    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);

        * {
            font-family: "Open Sans", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #111;
            background-repeat: no-repeat;
        }

        .signupSection {
            background: url(https://source.unsplash.com/TV2gg2kZD1o/1600x800);
            background-repeat: no-repeat;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 450px;
            text-align: center;
            display: flex;
            color: white;
            box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, 0.5);
        }

        .info {
            width: 45%;
            background: rgba(20, 20, 20, 0.8);
            padding: 30px 0;
            border-right: 5px solid rgba(30, 30, 30, 0.8);
        }

        .info h2 {
            padding-top: 30px;
            font-weight: 300;
        }

        .info p {
            font-size: 18px;
        }

        .info .icon {
            font-size: 8em;
            padding: 20px 0;
            color: #0ab4b4;
        }

        .signupForm {
            width: 70%;
            padding: 30px 0;
            background: rgba(20, 40, 40, 0.8);
            transition: 0.2s;
        }

        .signupForm h2 {
            font-weight: 300;
        }

        .inputFields {
            margin: 15px 0;
            font-size: 16px;
            padding: 10px;
            width: 250px;
            border: 1px solid #0ab4b4;
            border-top: none;
            border-left: none;
            border-right: none;
            background: rgba(20, 20, 20, 0.2);
            color: white;
            outline: none;
        }

        .noBullet {
            list-style-type: none;
            padding: 0;
        }

        #join-btn {
            border: 1px solid #0ab4b4;
            background: rgba(20, 20, 20, 0.6);
            font-size: 18px;
            color: white;
            margin-top: 20px;
            padding: 10px 50px;
            cursor: pointer;
            transition: 0.4s;
        }

        #join-btn:hover {
            background: rgba(20, 20, 20, 0.8);
            padding: 10px 80px;
        }
    </style>

    <script>
        window.console = window.console || function (t) {};
    </script>

</head>

<body translate="no">
    <div class="signupSection">
        <div class="info">
            <h2>Mission to Deep Space</h2>
            <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
            <p>The Future Is Here</p>
        </div>
        <form action="proceseaza_formular.php" method="POST" class="signupForm" name="signupform">
            <h2>Sign Up</h2>
            <ul class="noBullet">
                <li>
                    <label for="username"></label>
                    <input type="text" class="inputFields" id="username" name="username" placeholder="Username" value="" required />
                </li>
                <li>
                    <label for="password"></label>
                    <input type="password" class="inputFields" id="password" name="parola" placeholder="Password" value=""
                         required /> 
                         <!-- oninput="return passwordValidation(this.value)" -->
                </li>

                <li id="center-btn">
                    <input type="submit" id="join-btn" name="join" alt="Join" value="Join">
                </li>
            </ul>
        </form>
    </div>

    <script id="rendered-js">
        var alertRedInput = "#8C1010";
        var defaultInput = "rgba(10, 180, 180, 1)";

        function userNameValidation(usernameInput) {
            var username = document.getElementById("username");
            var issueArr = [];
            if (/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(usernameInput)) {
                issueArr.push("No special characters!");
            }
            if (issueArr.length > 0) {
                username.setCustomValidity(issueArr);
                username.style.borderColor = alertRedInput;
            } else {
                username.setCustomValidity("");
                username.style.borderColor = defaultInput;
            }
        }

        function passwordValidation(passwordInput) {
            var password = document.getElementById("password");
            var issueArr = [];
            if (!/^.{7,15}$/.test(passwordInput)) {
                issueArr.push("Password must be between 7-15 characters.");
            }
            if (!/\d/.test(passwordInput)) {
                issueArr.push("Must contain at least one number.");
            }
            if (!/[a-z]/.test(passwordInput)) {
                issueArr.push("Must contain a lowercase letter.");
            }
            if (!/[A-Z]/.test(passwordInput)) {
                issueArr.push("Must contain an uppercase letter.");
            }
            if (issueArr.length > 0) {
                password.setCustomValidity(issueArr.join("\n"));
                password.style.borderColor = alertRedInput;
            } else {
                password.setCustomValidity("");
                password.style.borderColor = defaultInput;
            }
        }
        //# sourceURL=pen.js
    </script>

</body>

</html>
