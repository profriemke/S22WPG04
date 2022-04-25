<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webprojekt</title>
</head>
<body>
<p> E-Mail </p>
<form action="signup_do.php" method="post">
    <h2>Neues Konto erstellen</h2>
    <input type="text" name="Vorname" id="Vorname" placeholder="Vorname"><br>
    <input type="text" name="Nachname" id="Nachname" placeholder="Nachname"><br>
    <input type="date" name="Geburtsdatum" id="Geburtsdatum" placeholder="Geburtsdatum"><br>
    <input type="password" name="Passwort" id="Passwort" placeholder="Passwort"> <br>
    <input type="text" name="Username" id="Username" placeholder="Username">  <br>

    <button type="submit" id="absenden">registrieren</button>
</form>
</body>
</html>