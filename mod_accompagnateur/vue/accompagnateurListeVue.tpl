<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{$titre|upper}</title>

        <link rel="icon" type="image/png" href="public/images/plogo.PNG" />
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid">

            {include file='public/menu.tpl'}

            <div class="row">
                <div class="col-md-4 space">
                    <a href="index.php?gestion=accueil"><img src="public/images/plogo.PNG" ></a>
                </div>
                <div class="col-md-6 space">
                    <h3>{$titreGestion}</h3>
                </div>
                <div class="col-md-2 space">

                    <form action='index.php' method='post'>
                        <input type='hidden' name='gestion' value='accompagnateur'>
                        <input type='hidden' name='action' value='form_ajouter'>

                        Ajouter un accompagnateur :
                        <input type="submit"  class="btn btn-warning btn-sm"  name="ajouter" value="Ajouter">
                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                    <p {if $message neq ''} class='pos-message'{/if}>
                        {$message}
                    </p>

                </div>
            </div>



            <div class="row">
                <!-- ICI LES DONNES  -->
                <div class="col-md-offset-1 col-md-10 col-md-offset-1">


                    <table class="table">
                        <thead class="">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    PRÉNOM
                                </th>
                                <th>
                                    NOM
                                </th>
                                <th>
                                    TÉLÉPHONE
                                </th>
                                <th>
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <p>INFORMATIONS : ... </p>
                                </td>
                            </tr>

                        </tfoot>
                        <tbody>

                            {foreach from=$listeAccompagnateurs item=accompagnateur}
                                <tr>
                                    <td>
                                        {$accompagnateur.acc_ide}
                                    </td>
                                    <td>
                                        {$accompagnateur.acc_pre}
                                    </td>
                                    <td>
                                        {$accompagnateur.acc_nom}
                                    </td>
                                    <td>
                                        {$accompagnateur.acc_tel}
                                    </td>
                                    <td>
                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='{$accompagnateur.acc_ide}'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_consulter'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="consulter" value="Consulter">
                                        </form>

                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='{$accompagnateur.acc_ide}'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_modifier'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="modifier" value="Modifier">
                                        </form>

                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='{$accompagnateur.acc_ide}'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_supprimer'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="supprimer" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                            {foreachelse}
                                <tr>
                                    <td colspan='6'>Aucun enregistrement de trouvé.</td>
                                </tr>
                            {/foreach}

                        </tbody>
                    </table>
                </div>
            </div>

            {include file='public/piedPage.tpl'}

        </div>

        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/scripts.js"></script>
    </body>
</html>
