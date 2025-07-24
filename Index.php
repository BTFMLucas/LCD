<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Community Connect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
    header { background-color: #ff6600; color: white; padding: 20px; text-align: center; }
    section { padding: 20px; max-width: 900px; margin: auto; }
    iframe { width: 100%; height: 315px; margin-bottom: 20px; border: none; }
    .discord { text-align: center; margin-top: 40px; }
    footer { background-color: #eee; text-align: center; padding: 10px; font-size: 0.9em; }
  </style>
</head>
<body>

  <header>
    <h1>Community Connect</h1>
    <p>Verbinde dich mit Gleichgesinnten – online und lokal</p>
  </header>

  <section>
    <h2>🎬 Unsere YouTube-Videos</h2>

    <?php
      // Liste der YouTube-Video-IDs
      $videos = [
        "WtmllIlFOGc",
        "y43WZDguYYI",
        "pmAbhnAvJS8"
      ];

      // Videos einbetten
      foreach ($videos as $videoId) {
        echo "<iframe src='https://www.youtube.com/embed/$videoId' allowfullscreen></iframe>";
      }
    ?>
  </section>

  <section class="discord">
    <h2>💬 Unser Discord-Server</h2>
    <p>Trete unserer Community bei und diskutiere live!</p>
    <iframe src="https://discord.com/widget?id=DEIN_SERVER_ID&theme=light"
            allowtransparency="true"
            sandbox="allow-popups allow-scripts allow-same-origin allow-presentation">
    </iframe>
  </section>

  <footer>
    &copy; <?= date("Y") ?> Community Connect · <a href="#">Impressum</a> · <a href="#">Datenschutz</a>
  </footer>

</body>
</html>
