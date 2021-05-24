
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
  <div class="row justify-content-center mt-5" >
  	<div id="divForm" class="col-lg-8 shadow p-3 mb-5 bg-white rounded justify-content-center" >
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-lg-4 control-label">Nombres</label>
          <div class="col-lg-4 formu" >
            <input  type="text" placeholder="Nombre" class="form-control" name="nombre" />
          </div>
        </div>
  
        <div class="form-group">
          <label class="col-lg-4 control-label">Correo Electrónico</label>
          <div class="col-lg-4 formu" >
            <input  type="emails" placeholder="Email" class="form-control" name="email" />
          </div>
        </div>
  
        <div class="form-group">
          <label class="col-lg-4 control-label">Su Mensaje</label>
          <div class="col-lg-4 formu" >
            <textarea class="form-control" id="msg" name="user_message" placeholder="Su mensaje"></textarea>
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

