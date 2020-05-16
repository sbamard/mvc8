<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{$titre|upper}</title>

    <link rel="icon" type="image/png" href="public/images/plogo.PNG"/>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">

    {include file ='public/menu.tpl'}

    <div class="row">
        <div class="col-md-4 space">
            <a href="index.php?gestion=reunion"><img src="public/images/plogo.PNG"></a>
        </div>
        <div class="col-md-6 space">
            <h3>{$titreGestion}</h3>
        </div>
        <div class="col-md-2 space">

        </div>
    </div>

    <div class="row">

        <div class="col-md-offset-2 col-md-8 col-md-offset-2">

            <p {if $unReunion->getMessageErreur() neq ''} class="pos-messageErreur" {/if}>
                {$unReunion->getMessageErreur()}
            </p>
        </div>

    </div>


    <div class="row">
        <!-- ICI LES DONNES, LE FORMULAIRE (LA FICHE !) -->
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 space">
            <form action="index.php" method="post" novalidate="">

                <input type="hidden" name="gestion" value="reunion">
                <input type="hidden" name="action" value="{$action}">
                <input type="hidden" id="acc_mpa" name="acc_mpa" type="text" value="">


                {if $action neq 'ajouter'}
                    <div class="form-group">
                        Identifiant :
                        <input class="form-control" id="reu_ide" name="reu_ide" type="text"
                               value="{$unReunion->getReu_ide()}" readonly>
                    </div>
                {/if}
                <div class="form-group">
                    Date de la réunion (*) :
                    <strong>
                        <input class="form-control" id="reu_dat" name="reu_dat" type="date"
                               value="{$unReunion->getReu_dat()}" {$comportement} required="required">
                    </strong>
                </div>
                <div class="form-group">
                    Heure de début de la réunion (*) :
                    <input class="form-control" id="reu_heu" name="reu_heu" type="time"
                           value="{$unReunion->getReu_heu()}" {$comportement} required="required">
                </div>
                <div class="form-group">
                    Durée prévisible de la réunion <sup>(*)</sup> :
                    <input class="form-control" id="reu_dur" name="reu_dur" type="time"
                           value="{$unReunion->getReu_dur()}" {$comportement} >
                </div>
                <div class="form-group">
                    Lieu de la réunion <sup>(*)</sup> :
                    <input class="form-control" id="reu_lie" name="reu_lie" type="text"
                           value="{$unReunion->getReu_lie()}" {$comportement} required="required">
                </div>
                <div class="form-group">
                    Capacité inscription :
                    <input class="form-control" id="reu_cap" name="reu_cap" type="number"
                           value="{$unReunion->getReu_cap()}" {$comportement} >
                </div>

                <div class="form-group">
                    Présentation, objectif Réunion :
                    <input class="form-control" id="reu_pre" name="reu_pre" type="text"
                           value="{$unReunion->getReu_pre()}" {$comportement} >
                </div>
                <div class="form-group">
                    Accompagnateur présent :
                    <input class="form-control" id="reu_acc" name="reu_acc" type="text"
                           value="{$unReunion->getReu_acc()}" {$comportement} >
                </div>
                <div class="form-group">
                    Publié :
                    <input class="form-control" id="reu_pub" name="reu_pub" type="boolean"
                           value="{$unReunion->getReu_pub()}" {$comportement} >
                </div>

                <div class="form-group">

                    <div class="col-md-11">
                        <input type="button" class="btn btn-warning btn-sm"
                               onclick='location.href = "index.php?gestion=reunion"' value="Retour">
                    </div>

                    {if $action neq 'consulter'}
                        <div class="col-md-1">
                            <input type="submit" class="btn btn-warning btn-sm" value="{$action|capitalize}">
                        </div>
                    {/if}

                </div>

            </form>

        </div>
    </div>

    {include file='public/piedPage.tpl'}

</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/scripts.js"></script>
</body>
</html>
