  <?php
  if (!isset($_SESSION)) {
  session_start();

}
  if($_SESSION['user_login_status']==2)
  {echo "<script>alert('area restringuida')</script>";
  echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
}
if($_SESSION['user_login_status']==3)
{echo "<script>alert('area restringuida')</script>";
echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
}

  ?>
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="panel.php">
                          <i class="fa fa-dashboard"></i> Panel

                       <!-- <img src="logo/lo.jpg" width="40%" height="40%" title="Panel" /> -->


                        </a>

                    </li>


                    <li>
                       <a href="#"><i class="fa fa-user"></i>Doctor<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevo_doctor.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Nuevo Doctor</a>
                            </li>
                             <li>
                                <a href="lista_doctor.php"><i class="glyphicon glyphicon-list" aria-hidden="true"></i> Lista Doctores</a>
                            </li>
                            <li>
                                <a href="consultarproductividad.php"><i class="glyphicon glyphicon-list" aria-hidden="true"></i> Consultar Productividad</a>
                            </li>

                        </ul>

                    </li>

                     <li>
                       <a href="#"><i class="fa fa-users"></i>Cliente<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevo_cliente.php"><i class="glyphicon glyphicon-user" aria-hidden="true"> </i>  Nuevo Cliente</a>
                            </li>
                              <li>
                                <a href="lista_clientes.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Clientes </a>
                            </li>
                            <li>
                                <a href="nuevo_mascota.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"> </i>  Asignar Paciente</a>
                            </li>

                        </ul>

                    </li>
                    
                       <li>
                       <a href="#"><i class="fa fa-users"></i>Proveedor<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevo_proveedor.php"><i class="glyphicon glyphicon-user" aria-hidden="true"> </i>  Nuevo Proveedor</a>
                            </li>
                              <li>
                                <a href="lista_proveedor.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Proveedores </a>
                            </li>
                            

                        </ul>

                    </li>
                    
                     <li>
                        <a href="#"><i class="fa fa-archive"></i> Paciente<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">



                            <li>
                                <a href="lista_mascotas.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Pacientes </a>
                            </li>

                          </ul>
                    </li>

                    <li>
                       <a href="#"><i class="fa fa-qrcode"></i>Producto<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevo_producto.php"><i class="glyphicon glyphicon-tags" aria-hidden="true"> </i>  Nuevo Producto</a>
                            </li>
                             <li>
                                   <a href="lista_productos_petshop.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Productos Petshop </a>
                            </li>  
                               <li>
                                   <a href="lista_productos_farmacia.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Productos Farmacia </a>
                            </li>
                                 <li>
                                   <a href="lista_productos_topicos.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Productos Topicos </a>
                            </li>
                            <li>
                                <a href="lista_servicios_topico.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Servicios Topicos </a>
                            </li>
                                 <li>
                                   <a href="lista_productos_banios.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Productos Baños </a>
                            </li>
<!--                            <li>
                                <a href="lista_productos_lote.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i>  Lista Productos por Lote</a>
                            </li>-->

                        </ul>

                    </li>
                    
                    
                       <li>
                        <a href="#"><i class="fa fa-barcode"></i>Compras<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevacompra.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Nueva Compra</a>
                            </li>
                            <li>
                                <a href="consultarcompras.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Consultar</a>
                            </li>
                           
                          

                            



                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-barcode"></i>Ventas<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="Nuevaventa.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Farmacia</a>
                            </li>
                            <li>
                                <a href="Nuevaventapetshop.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Petshop</a>
                            </li>
                            <li>
                                <a href="Nuevaventatopicos.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Topicos</a>
                            </li>
                            <li>
                                <a href="Nuevaventabanio.php"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i>Baños</a>
                            </li>

                            



                        </ul>
                    </li>
                    
                        <li>
                        <a href="#"><i class="fa fa-money"></i>Ingresos<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                            <li>
                                <a href="consultaringresos.php"><i class="fa fa-money" aria-hidden="true"></i> Farmacia</a>
                            </li>
                            <li>
                                <a href="consultaringresos_petshop.php"><i class="fa fa-money" aria-hidden="true"></i> Petshop</a>
                            </li>
                            <li>
                                <a href="consultaringresos_topico.php"><i class="fa fa-money" aria-hidden="true"></i> Topicos</a>
                            </li>
                            <li>
                                <a href="consultaringresos_banio.php"><i class="fa fa-money" aria-hidden="true"></i> Baños</a>
                            </li>




                        </ul>
                    </li>



                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> Citas<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                              <li>
                                  <a href="calendario.php"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>   Nueva Cita </a>
                            </li>
                             <li>
                                 <a href="lista_citas.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i> Todas las Citas </a>
                            </li>
                          </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-qrcode"></i> Administrador <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="nuevo_admin.php"><i class="fa fa-user" aria-hidden="true"></i> Usuario Administrador</a>
                            </li>
                            <li>
                                <a href="lista_admin.php"><i class="glyphicon glyphicon-list " aria-hidden="true"></i> Lista Administradores</a>
                            </li>
                          </ul>
                    </li>

                       <li>
                        <a href="#"><i class="glyphicon glyphicon-cog"></i> Configurar<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="confiperfil.php">Perfil</a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

        </nav>
