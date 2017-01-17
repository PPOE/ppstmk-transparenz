<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <header>
                <img src="images/LogoStmk.png" alt="Piratenpartei Steiermark" />
                <h1 class="pirate-highlight">Transparenzbericht</h1>

                <nav class="navbar navbar-toggleable-md navbar-inverse navbar-main">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Finanzen
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Konto: Landesorganisation</a>
                                    <a class="dropdown-item" href="#">Konto: Parteienförderung</a>
                                    <a class="dropdown-item" href="#">Konto: Klubförderung</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Something</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Something</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <p>breadcrumbs</p>

            <h2>Konto: Landesorganisation</h2>
            <h3>2016</h3>

            <p>
                TODO: Stats
            </p>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $fileLandesorg = 'data/landesorganisation-2016.csv';
?>

            <h4>Einnahmen</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Kategorie</th>
                    <th>Partner</th>
                    <th>Buchungstext</th>
                    <th>Betrag</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $file = fopen($fileLandesorg, 'r');
                while (($line = fgetcsv($file)) !== FALSE) {
                    if ($line[0] === 'Buchungsdatum') {
                        continue;
                    }
                    if (floatval($line[6]) > 0) {
                        continue;
                    }
                    ?>
                    <tr>
                        <td><?php echo $line[0]; ?></td>
                        <td><?php echo $line[10]; ?></td>
                        <td><?php echo $line[1]; ?></td>
                        <td><?php echo $line[8]; ?></td>
                        <td><?php echo $line[6]; ?></td>
                    </tr>
                    <?php
                }
                fclose($file);
                ?>
                </tbody>
            </table>

            <h4>Ausgaben</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Kategorie</th>
                    <th>Partner</th>
                    <th>Buchungstext</th>
                    <th>Betrag</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $file = fopen($fileLandesorg, 'r');
                while (($line = fgetcsv($file)) !== FALSE) {
                    if ($line[0] === 'Buchungsdatum') {
                        continue;
                    }
                    if (floatval($line[6]) < 0) {
                        continue;
                    }
                    ?>
                    <tr>
                        <td><?php echo $line[0]; ?></td>
                        <td><?php echo $line[10]; ?></td>
                        <td><?php echo $line[1]; ?></td>
                        <td><?php echo $line[8]; ?></td>
                        <td><?php echo $line[6]; ?></td>
                    </tr>
                    <?php
                }
                fclose($file);
                ?>
                </tbody>
            </table>



            <footer class="text-center">
                <hr />
                <a href="//creativecommons.org/publicdomain/zero/1.0/">CC0 1.0</a>
                &copy;
                <a href="//piraten-graz.at/rechtliches/impressum/">Piratenpartei Graz</a> 2017 -
                <a href="//www.facebook.com/piratengraz">Facebook</a> -
                <a href="//twitter.com/PiratenGraz">Twitter</a> -
                <a href="//github.com/PPOE/ppstmk-transparenz">GitHub</a>
            </footer>
        </div>

        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
