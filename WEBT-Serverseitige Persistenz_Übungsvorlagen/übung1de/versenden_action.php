<!DOCTYPE html>
<html>

<head>
    <title>Übung 1: Newsletter versenden: Status</title>
    <meta charset="utf8">
</head>

<body>
    <?php

    function validateParameters()
    {
        if (!isset($_POST['betreff'])) {
            echo "<p>Parameter 'betreff' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['text'])) {
            echo "<p>Parameter 'text' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['kategorie'])) {
            echo "<p>Parameter 'kategorie' ist benötigt</p>";
            return false;
        }

        $kategorie = intval($_POST['kategorie']);
        if ($kategorie < 1 || $kategorie > 3) {
            echo "<p>Parameter 'kategorie' muss eine Ganzzahl im Bereich 1-3 sein.</p>";
            return false;
        }

        return true;
    }

    function versendeMails($conn, $betreff, $text, $kategorie)
    {
        // TODO: Die SQL-Query zur Abfrage der Email nach Kategorie einfügen
        //       Resultat in $res speichern
        $query = "select * from mailing_list where kategorie=?";

        $statement = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($statement, 'i', $kategorie);

        mysqli_stmt_execute($statement);
        $res = mysqli_stmt_get_result($statement);

        if ($res) {

            // TODO: Für jeden Eintrag (while-loop):
            // * (1d) die Emailadresse ausgeben
            while ($row = mysqli_fetch_assoc($res)) {
                echo "Verschickt an: " . $row['email'];
            }
            // * (1e) das Mail verschicken (Aufruf der Funktion mail)

        } else {
            echo "<p>Ein Fehler ist aufgetreten.</p>";
        }
    }

    // main
    if (validateParameters()) {
        $conn = mysqli_connect("localhost", "root", "", "newsletter");
        if (!$conn) {
            echo "<p>Database connection failed</p>";
        } else {
            versendeMails($conn, $_POST['betreff'], $_POST['text'], intval($_POST['kategorie']));
            mysqli_close($conn);
        }
    }
    ?>
</body>

</html>