<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webprojekt</title>
</head>
<body>

<form action="signup_do.php" method="post">
    <h2>Neues Konto erstellen</h2>
    <input type="text" name="vorname" id="vorname" placeholder="Vorname"><br>
    <input type="text" name="nachname" id="nachname" placeholder="Nachname"><br>
    <input type="text" name="email" id="email" placeholder="E-Mail"><br>
    <input type="date" name="geburtsdatum" id="geburtsdatum" placeholder="Geburtsdatum"><br>
    <input type="password" name="passwort" id="passwort" placeholder="Passwort"> <br>
    <input type="text" name="username" id="username" placeholder="Username">  <br>
    <label for="file">Profilbild hinzufügen</label> <br>
    <input type ="file" name="file"><br>

    <button type="submit" id="absenden">registrieren</button>
</form>
</body>
</html>