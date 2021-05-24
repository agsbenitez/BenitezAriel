
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo validation_errors(); ?>



<section>
  
  <div class="row justify-content-center mt-5" >
    <div id="divForm" class="col-lg-8 shadow p-3 mb-5 bg-white rounded " >
    <p>Nuevo Usuario</p>
      <form action="<?php echo BASE_URL(); ?>nuevo_usuario/save" class="form-horizontal" method="POST">
        <div class="form-group">
          <label class="col-lg-4 control-label">Nombre</label>
          <div class="col-lg-4 formu" >
            <input  type="text" placeholder="Nombre" class="form-control" name="nombre" value="<?php echo set_value('nombre'); ?>" size="50">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label">Apellido</label>
          <div class="col-lg-4 formu" >
            <input  type="text" placeholder="Apellido" class="form-control" name="apellido" value="<?php echo set_value('apellido'); ?>" size="50"/>
          </div>
        </div>
  
        <div class="form-group">
          <label class="col-lg-4 control-label">Correo Electrónico</label>
          <div class="col-lg-4 formu" >
            <input  type="emails" placeholder="Email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" size="50"/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label">Contraseña</label>
          <div class="col-lg-4 formu" >
            <input  type="password" placeholder="Password" class="form-control" name="pass1" value="<?php echo set_value('pass'); ?>" size="50"/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label">Repita la Contraseña</label>
          <div class="col-lg-4 formu" >
            <input  type="password" placeholder="Password" class="form-control" name="pass2" value="<?php echo set_value('pass'); ?>" size="50"/>
          </div>
        </div>
  
        <div class="form-group">
          <div >
            <button type="submit" class="btn btn-success left">Enviar</button>
            <button type="reset" class="btn btn-secondary rigth">Limpiar</button>
          </div>
        </div>
  
      </form>
  	</div>
  </div>
</section>

