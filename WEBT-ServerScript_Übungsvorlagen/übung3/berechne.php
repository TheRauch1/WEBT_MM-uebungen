<!DOCTYPE html>
<html>

<head>
    <title>Berechnetes Idealgewicht</title>
    <meta charset="utf8">
</head>

<body>
    <?php

    // TODO: Übernehmen Sie hier Funktion berechneIdealgewicht aus Übung 3 der Serie
    //       "Interaktive Web-Applikationen" und nehmen Sie Anpassungen vor, welche
    //       für PHP notwendig sind.

    function pruefeParameter()
    {
        if (!isset($_POST['geschlecht'])) {
            echo "<p>Parameter 'geschlecht' wird benötigt</p>";
            return false;
        }
        if (!isset($_POST['groesse'])) {
            echo "<p>Parameter 'groesse' wird benötigt</p>";
            return false;
        }
        return true;
    }

    if (pruefeParameter()) {
        // TODO: Parameter auslesen und Berechnung des Idealgewichts
        $geschlecht = $_POST['geschlecht'];
        $groesse = $_POST['groesse'];
        if ($geschlecht = 'm') {
            $idealgewicht = $groesse - 100;
        }
        if ($geschlecht = 'w') {
            $idealgewicht = 0.9 * ($groesse - 100);
        }

        // TODO: Ausgabe des Idealgewichts
        echo "<p>" . $idealgewicht . "</p>";
    }
    ?>
    <a href="IdealgewichtForm.html">Zurück zum Formular</a>
</body>

</html>