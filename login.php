<?php
session_start();
ob_start();
include("configuracion.php");

  //if(isset($_REQUEST['Ingresar']))
  //{
    if($_REQUEST["user"] == "" or $_REQUEST["pass"] == "")
    {   
      ?>
        <script language="javascript">
        alert("\tRellena los Campos Correctamente \n \tFavor de verificar");
        window.location="../proyecto hospital/logueo.php";
      </script>           
      <?php
    }
  //}
       else 
       {
            //$pass = md5($_POST["password"]);

            $r = mysqli_query($conexion,"select * from usuario WHERE nombreusuario='".$_REQUEST["user"]."'");
                        
                        // and contraseña='".$_REQUEST["pass"]."'");
      //consulta para validar usuario y contraseña ingresados en la base de datos         
            $r2 = mysqli_fetch_array($r);
      // instruccion para poder visualizar los registros en la base de datos segun corresponda
          $r1 = mysqli_num_rows($r);
      // instruccion para mostrar cantidad de registros mostrados de la consulta

            if($r1 == 1) //comparacion donde tiene que mostrar solo 1 registro (usuario nunca se debe de repetir)
            {
                 $_SESSION["usuario"] = $r2["usuario"]; // declaracion de la variable de sesion usuario
               $_SESSION["tipo"] = $r2["tipo"]; // declaracion de la variable de sesion tipo de usuario
               ?>
                   <script language="javascript">
                   alert("Te haz logueado satisfactoriamente");
                   window.location="../proyecto hospital/AltaArea.php";
                   </script>
               <?php
            }
             else
            {
          ?>
                 <script language="javascript">
                 alert("Error, Escriba correctamente su Usuario y/o Password");
                 window.location="../proyecto hospital/logueo.php";
                 </script> 
          <?php
            }
      }
?>