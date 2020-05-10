<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-07 12:44:08
  from '/Applications/MAMP/htdocs/mvc-coopemploi/mvc-ce-07/mod_accompagnateur/vue/accompagnateurListeVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8c759818f373_82749472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55b97c6a9637357cb9198ca804d6c1525d205d14' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc-coopemploi/mvc-ce-07/mod_accompagnateur/vue/accompagnateurListeVue.tpl',
      1 => 1586263438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/menu.tpl' => 1,
    'file:public/piedPage.tpl' => 1,
  ),
),false)) {
function content_5e8c759818f373_82749472 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['titre']->value, 'UTF-8');?>
</title>

        <link rel="icon" type="image/png" href="public/images/plogo.PNG" />
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid">

            <?php $_smarty_tpl->_subTemplateRender('file:public/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <div class="row">
                <div class="col-md-4 space">
                    <a href="index.php?gestion=accueil"><img src="public/images/plogo.PNG" ></a>
                </div>
                <div class="col-md-6 space">
                    <h3><?php echo $_smarty_tpl->tpl_vars['titreGestion']->value;?>
</h3>
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
                    <p <?php if ($_smarty_tpl->tpl_vars['message']->value != '') {?> class='pos-message'<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

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

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeAccompagnateurs']->value, 'accompagnateur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accompagnateur']->value) {
?>
                                <tr>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_ide'];?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_pre'];?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_nom'];?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_tel'];?>

                                    </td>
                                    <td>
                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='<?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_ide'];?>
'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_consulter'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="consulter" value="Consulter">
                                        </form>

                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='<?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_ide'];?>
'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_modifier'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="modifier" value="Modifier">
                                        </form>

                                        <form action='index.php' method='post'>
                                            <input type='hidden' name='acc_ide' value='<?php echo $_smarty_tpl->tpl_vars['accompagnateur']->value['acc_ide'];?>
'>
                                            <input type='hidden' name='gestion' value='accompagnateur'>
                                            <input type='hidden' name='action' value='form_supprimer'>

                                            <input type="submit"  class="btn btn-warning btn-sm"   name="supprimer" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                            <?php
}
} else {
?>
                                <tr>
                                    <td colspan='6'>Aucun enregistrement de trouvé.</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>
                </div>
            </div>

            <?php $_smarty_tpl->_subTemplateRender('file:public/piedPage.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>

        <?php echo '<script'; ?>
 src="public/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/js/scripts.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
