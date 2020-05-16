<div class="row">
    <div class="col-md-12">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button> <a class="navbar-brand nav-color" href="index.php">Accueil </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="nav-color" href="index.php?gestion=reunion">Réunions</a>
                    </li>
                    <li>
                        <a class="nav-color" href="#">Entretiens</a>
                    </li>
                    <li>
                        <a class="nav-color" href="#">Porteurs de projet</a>
                    </li>
                    <li>
                        <a class="nav-color" href="index.php?gestion=accompagnateur">Accompagnateurs</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">Paramètres<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?gestion=lieu">Lieux</a>
                            </li>

                            <li class="divider"> </li>

                            <li>
                                <a href="#">Activités</a>
                            </li>

                            <li class="divider"> </li>

                            <li>
                                <a href="#">Types</a>
                            </li>

                            <li class="divider"> </li>

                            <li>
                                <a href="#">Etc ...</a>
                            </li>

                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="nav-color" href="#">Plan du site</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-color" data-toggle="dropdown">Espace personnel<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?gestion=authentification&action=deconnexion">{$deconnexion}</a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="#">Profil</a>

                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>