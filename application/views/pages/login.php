
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo validation_errors(); ?>



<section>
  
  <div class="row justify-content-center mt-5" >
    <div id="divForm" class="col-lg-8 shadow p-3 mb-5 bg-white rounded " >
    <p>Login</p>
      <form action="<?php echo BASE_URL(); ?>login/login" class="form-horizontal" method="POST">
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
          <div >
            <button type="submit" class="btn btn-success left">Enviar</button>
            <button type="reset" class="btn btn-secondary rigth">Limpiar</button>
          </div>
        </div>
  
      </form>
  	</div>
  </div>
</section>

