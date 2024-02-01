<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Abonamnt</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    #video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .info-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      margin: 20px; /* Spatiere intre chenare */
      width: 33%; /* Ocupă 1/3 din lățimea paginii */
    }

    h1, p, .price {
      color: #333;
    }

    .price {
      font-size: 24px;
      color: #e44d26;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <video id="video-background" autoplay muted loop>
    <!-- Înlocuiește 'video.mp4' cu calea către videoul tău -->
    <source src="car.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="container">
    <div class="info-container">
      <h1>Abonament Lunar</h1>
      <p>Abonamentul se achită lunar și este la un preț fix de</p>
      <p class="price">400 de lei</p>
    </div>

    <div class="info-container">
      <h1>Achitare Per Oră</h1>
      <p>Achitarea per oră este de 10 lei.</p>
    </div>
  </div>
</body>
</html>
