<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="UTF-8">
    <title>Hospital</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../administrador/estilo_admin.css">
    <link rel="stylesheet" href="../../administrador/estilo.css">
  </head>
  <!-- ============ ENLACES DE NAVEGACION ====================== -->
  <body>
    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav navbar-left">
        <a class="navbar-brand">
          <span class="glyphicon glyphicon-user"> </span>
          <?php echo ' '.$_SESSION["tipo"],': '.$_SESSION["usuario"]; ?>
        </a>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="../ses/logout.php">
            <span class="glyphicon glyphicon-ban-circle"> </span> Cerrar sesion
          </a>
        </li>
      </ul>
    </nav >
    <div id="header">
      <ul class="nav">
        <?php if($_SESSION["tipo"]=="ADMINISTRADOR"){ ?>
        <li>
          <a href="">Usuario
          </a>
          <ul>
            <li>
              <a href="../../administrador/agregar_usuario.php">Alta
              </a>
            </li>
            <li>
              <a href="../../administrador/eliminar_usuario.php">Baja
              </a>
            </li>
            <li>
              <a href="../../administrador/editar_usuario.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php
}
if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Empleado
          </a>
          <ul>
            <li>
              <a href="../../administrador/agregar_empleado.php">Alta
              </a>
            </li>
            <li>
              <a href="../../administrador/eliminar_empleado.php">Baja
              </a>
            </li>
            <li>
              <a href="../../administrador/editar_empleado.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Area
          </a>
          <ul>
            <li>
              <a href="../../administrador/agregar_area.php">Alta
              </a>
            </li>
            <li>
              <a href="../../administrador/eliminar_area.php">Baja
              </a>
            </li>
            <li>
              <a href="../../administrador/editar_area.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Farmacia
          </a>
          <ul>
            <li>
              <a href="../../administrador/agregar_producto.php">Alta
              </a>
            </li>
            <li>
              <a href="../../administrador/eliminar_producto.php">Baja
              </a>
            </li>
            <li>
              <a href="../../administrador/editar_producto.php">Editar
              </a>
            </li>
          </ul>
        </li>
        <?php }
if($_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li>
          <a href="">Recursos Humanos
          </a>
          <ul>
            <li>
              <a href="">Asignar Area
              </a>
              <ul>
                <li>
                  <a href="">Alta
                  </a>
                <li>
                  <a href="../../administrador/editar_recursos_humanos_area.php">Editar
                  </a>
                </li>
                <li>
                  <a href="../../administrador/eliminar_recursos_humanos.php">Baja
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="">Asignar sueldo
              </a>
              <ul>
                <li>
                  <a href="">Alta
                  </a>
                </li>
                <li>
                  <a href="../../administrador/editar_recursos_humanos_sueldo.php">Editar
                  </a>
                </li>
                <li>
                  <a href="../../administrador/eliminar_recursos_humanos.php">Baja
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="">Reportes
          </a>
          <ul>
            <li>
              <a href="">Mostrar Nomina Total
              </a>
              <ul>
                <li>
                  <a href="interfaz_area.php">Por Area
                  </a>
                </li>
                <li>
                  <a href="interfaz_sueldo.php">Por Sueldo
                  </a>
                </li>
                <li>
                  <a href="interfaz_asistencia.php">Asistencia
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="">Mostrar Todos Los Medicamentos
              </a>
              <ul>
                <li>
                  <a href="interfaz_precio.php">Por precio
                  </a>
                </li>
                <li>
                  <a href="interfaz_tipo.php">Por tipo
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div>
  </body>
</html>
