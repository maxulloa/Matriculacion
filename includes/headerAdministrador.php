<header id="header">
  <div class="logo pull-left"> Sistema de Matriculación</div>
  <div class="header-content">
    <div class="pull-right clearfix">
      <ul class="info-menu list-inline list-unstyled">
        <li class="profile">
          <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
            <img src="images/imgAdmin.png" alt="user-image" >
            <span><?php echo $ncompleto; ?><i class="caret"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="perfilAdministrador.php">
                <i class="glyphicon glyphicon-user"></i>
                Perfil
              </a>
            </li>
            <li>
              <a href="edit_account.php" title="edit account">
                <i class="glyphicon glyphicon-cog"></i>
                Configuración
              </a>
            </li>
            <li class="last">
              <a href="funciones/logout.php">
                <i class="glyphicon glyphicon-off"></i>
                Salir
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>
