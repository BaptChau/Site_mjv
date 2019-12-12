<?php

use App\Models\Entrainement;

$entrainement = new Entrainement();

$tabEntrainement = $entrainement->getAll();

?>

<div class="container">
    <p>Le club a été crée en 1970 dans le village de vaubecourt et à tout de suite eu le nom que l'on connais</p>
    <p>Ajourd'hui le club est présidé par Fabien Obara et la secrétaire et Catherine Michelot</p>
    <p>Voici le programe des entrainement :</p>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class=" table-dark">
                <tr>
                    <td>
                        Équipe :
                    </td>
                    <td>
                        Coach :
                    </td>
                    <td>
                        Horraire :
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tabEntrainement as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $value['equipe'] ?>
                        </td>
                        <td>
                            <?= $value['coach'] ?>
                        </td>
                        <td>
                            <?= $value['horraire'] ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>