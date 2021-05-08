<!DOCTYPE html>
<html>

<head>
    <title>Hallo</title>
    <meta charset="utf8">
</head>

<body>
    <?php
    $name = $_POST['name'];
    // TODO: (2) Prüfen, ob Parameters 'name' gesetzt ist (ersetzen Sie true)
    if (isset($name))  {
        // TODO: (1) Ausgabe des Parameters 'name'
        echo $name;
    } else {
        echo "<p>Parameter 'name' nicht gesetzt</p>";
    }
    ?>
</body>

</html>