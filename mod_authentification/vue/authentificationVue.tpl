<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{$titre|upper}</title>

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">

        <link rel="icon" type="image/png" href="public/images/logo.PNG" />
    </head>
    <body>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4 space">
                    <a href="index.php"><img src="public/images/plogo.PNG" ></a>
                </div>

                <div class="col-md-6 space">
                    <h4> {$titreGestion} </h4>
                </div>

                <div class="col-md-2 space">


                </div>
            </div>
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-md-offset-1">

                    <p {if $message neq ''} class="pos-messageErreur" {/if}>
                        {$message}
                    </p>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                </div>
                <div class="col-md-4">

                    <br>
                    <form role="form" action="index.php" method="POST" >
                        <input type="hidden" name="gestion" value="authentification">
                        <input type="hidden" name="action" value="{$action}">
                        <div class="form-group">
                            <label for="login">
                                Login :
                            </label>

                            <input class="form-control" type="text" name="f_login" maxlength="255" value="{$authentification->getF_login()}">
                        </div>


                        <div class="form-group">
                            <label for="pw">
                                Mot de passe :
                            </label>

                            <input autocomplete="off" class="form-control" type="password" name="f_motdepasse"  maxlength="255" value="">
                        </div>


                        <div class="form-group">
                            <label for="valider">
                            </label>
                            <input type="submit"  class="btn btn-warning btn-sm"   name="valider" value="Connexion">

                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                </div>


            </div>
        </div>
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/scripts.js"></script>
    </body>
</html>