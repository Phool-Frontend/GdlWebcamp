  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../admin/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GDLWebcamp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="../admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                
                <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                              <!-- Add icons to the links using the .nav-icon class
                                  with font-awesome or any other icon font library -->

                            <!--Link 1 Dashboard-->
                              <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                  <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="dashboard.php" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Dashboard</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            <!--Link 2 Eventos-->
                              <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fa fa-calendar"></i>
                                  <p>
                                    Eventos
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="lista-evento.php" class="nav-link">
                                      <i class="fa fa-list-ul"></i>
                                      <p>Ver Todos</p>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="crear-evento.php" class="nav-link">
                                      <i class="fa fa-plus-circle"></i>
                                      <p>Agregar</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            <!--Link 3 Categoria Eventos-->
                            <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            Categoria Eventos
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="lista-categorias.php" class="nav-link">
                                            <i class="fa fa-list-ul"></i>
                                            <p>Ver Todos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="crear-categoria.php" class="nav-link">
                                            <i class="fa fa-plus-circle"></i>
                                            <p>Agregar</p>
                                            </a>
                                        </li>
                                        </ul>
                            </li>

                            <!--Link 4 Invitados-->
                            <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-user-circle"></i>
                                        <p>
                                            Invitados
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="lista-invitados.php" class="nav-link">
                                            <i class="fa fa-list-ul"></i>
                                            <p>Ver Todos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="crear-invitado.php" class="nav-link">
                                            <i class="fa fa-plus-circle"></i>
                                            <p>Agregar</p>
                                            </a>
                                        </li>
                                        </ul>
                            </li>

                            <!--Link 5 Registrados-->
                            <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-address-card"></i>
                                        <p>
                                            Registrados
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="lista-registrados.php" class="nav-link">
                                            <i class="fa fa-list-ul"></i>
                                            <p>Ver Todos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="crear-registro.php" class="nav-link">
                                            <i class="fa fa-plus-circle"></i>
                                            <p>Agregar</p>
                                            </a>
                                        </li>
                                        </ul>
                            </li>
                    <?php
                        if($_SESSION['nivel'] === 1):
                    ?>

                            <!--Link 6 Administradores-->
                            <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Administradores
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="lista-admin.php" class="nav-link">
                                            <i class="fa fa-list-ul"></i>
                                            <p>Ver Todos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="crear-admin.php" class="nav-link">
                                            <i class="fa fa-plus-circle"></i>
                                            <p>Agregar</p>
                                            </a>
                                        </li>
                                        </ul>
                            </li>

                    <?php
                        endif;
                    ?>
                            <!--Link 7 Testimoniales-->
                            <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-comments"></i>
                                        <p>
                                            Testimoniales
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                            <i class="fa fa-list-ul"></i>
                                            <p>Ver Todos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                            <i class="fa fa-plus-circle"></i>
                                            <p>Agregar</p>
                                            </a>
                                        </li>
                                        </ul>
                            </li>



              
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
