<?php
    if(isset($_POST['depart']) && isset($_POST['arrivee']))
    {
        if(!empty($_POST['depart']) && !empty($_POST['arrivee']))
        {
            $depart = $_POST['depart'];
            $arrivee = $_POST['arrivee'];
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
            <h1 class="mb-5">Calcul routier</h1>

            <form action="index.php" method="POST" class="mb-5">
                <div class="form-group">
                    <input type="text" class="form-control mb-2" id="depart" name="depart" placeholder="Ville de départ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-2" id="arrivee" name="arrivee" placeholder="Ville d'arrivée">
                </div>
                <button type="submit" class="btn btn-primary">Calculer</button>
            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ville de départ</th>
                        <th scope="col">Ville d'arrivé</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Temps de trajet</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <?php
                                if(isset($_POST['depart']))
                                {
                                    $depart = $_POST['depart'];
                                    echo $depart;
                                }
                            ?>
                        </th>
                        <td>
                            <?php
                                if(isset($_POST['arrivee']))
                                {
                                    $arrivee = $_POST['arrivee'];
                                    echo $arrivee;
                                }
                            ?>
                        </td>
                        <td>500km</td>
                        <td>2h12</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
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