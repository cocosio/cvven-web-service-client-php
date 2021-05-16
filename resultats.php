<?php

# Récup la date
$date = $_POST['date'];

# Apppel ws et récup données
const WSDL = 'http://localhost:8080/cvven-web-service-java/DispoWebService?WSDL';
$soapclt = new SoapClient(WSDL, []);
$res = $soapclt->dispoParDate($date);
$disponibilites = $res->return;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Disponibilités en date du <?php echo $date ?></h1>
<table>
    <thead>
    <th>Logement</th>
    <th>Dispos</th>
    </thead>
    <tbody>
    <?php foreach ($disponibilites as $disponibilite): ?>
    <tr>
        <td><?php echo $disponibilite->logement; ?></td>
        <td><?php echo $disponibilite->dispo; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
