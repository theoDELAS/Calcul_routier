<?php
    if(isset($_POST['villeDepart']) && isset($_POST['villeArrivee']) && !empty($_POST['villeDepart']) && !empty($_POST['villeArrivee']))
    {
        // input ville de départ
        $villeDepart = $_POST['villeDepart'];
        // input ville d'arrivée
        $villeArrivee = $_POST['villeArrivee'];

        //url de l'API concaténée avec les données renseignées dans mes deux input du dessus
        $url = 'https://fr.distance24.org/route.json?stops=' . $_POST['villeDepart'] . '|' . $_POST['villeArrivee'];
        // récupération du fichier json approprié en fonction de l'URL récupéré juste avant
        $json = file_get_contents($url);
        // décode le fichier json récupéré afin qu'il soit exploitable en PHP
        $fichier_json = json_decode($json, true);
        // récupère la distance dans le fichier json entre la ville de départ et d'arrivée
        $distance = $fichier_json['distance'];

        $distanceParcourue = 0;
        $dureeSurLaRoute = 0;
        $vitesse = 0;
        $pause = false;
        $nbPauses = 0;
        $tempsAvantPause = 0;
        $distanceParcourue = 0;

        while ($distance > $distanceParcourue)
        {
            if ($tempsAvantPause == 120)
            {
                $pause = true;
            }

            if ($pause == true)
            {
                $vitesse = 0;
                $distanceParcourue += 6;
                $dureeSurLaRoute += 24;
                $pause = false;
                $tempsAvantPause = 0;
                $nbPauses += 1;
            }
            else
            {
                if ($vitesse < 90 && $distance - 6 > $distanceParcourue)
                {
                    $vitesse += 10;
                    $distanceParcourue += $vitesse /60;
                    $dureeSurLaRoute += 1;
                    $tempsAvantPause += 1;
                }
                elseif ($vitesse == 90 && $distance - 6 > $distanceParcourue)
                {
                    $distanceParcourue += $vitesse / 60;
                    $dureeSurLaRoute += 1;
                    $tempsAvantPause += 1;
                }
                else
                {
                    $vitesse -= 10;
                    $distanceParcourue += $vitesse / 60;
                    $dureeSurLaRoute += 1;
                    $tempsAvantPause += 1;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Calcul routier</title>
    </head>
    <body>
        <div class="container">
            <h1 class="my-5 text-center">Calcul routier</h1>

            <form action="index.php" method="POST" class="mb-5">
                <div class="form-group w-50 m-auto">
                    <input type="text" class="form-control mb-2" id="villeDepart" name="villeDepart" placeholder="Ville de départ">
                </div>
                <div class="form-group w-50 m-auto">
                    <input type="text" class="form-control mb-4" id="villeArrivee" name="villeArrivee" placeholder="Ville d'arrivée">
                </div>
                <button type="submit" class="btn btn-primary btn-block w-25 m-auto">Calculer</button>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ville de départ</th>
                        <th scope="col">Ville d'arrivée</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Temps de trajet</th>
                        <th scope="col">Nombre de pauses</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                                if(isset($_POST['villeDepart']))
                                {
                                    $depart = $_POST['villeDepart'];
                                    echo $depart;
                                }
                                else 
                            ?>
                        </th>
                        <td>
                            <?php
                                if(isset($_POST['villeArrivee']))
                                {
                                    $arrivee = $_POST['villeArrivee'];
                                    echo $arrivee;
                                }
                                else 
                            ?>
                        </td>
                        <td>
                            <?php
                                if(isset($distance))
                                {
                                    echo $distance . ' km';
                                }
                                else 
                            ?>
                        </td>
                        <td>
                            <?php
                                if(isset($distance))
                                {
                                    echo date("H:i", $dureeSurLaRoute * 60);
                                }
                                else 
                            ?>
                        </td>
                        <td>
                            <?php
                                if(isset($distance))
                                {
                                    echo $nbPauses;
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>




        <script
                src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">

        </script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>
        <script
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
        </script>
    </body>
</html>