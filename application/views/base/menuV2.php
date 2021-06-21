<nav class="navbar navbar-expand-lg  bg-dark text-white-50 navbar-dark">
  <a class="navbar-brand" href=<?php echo BASE_URL("inicio");?> >Le Motocycliste</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <?php if( $this->session->userdata('logged_in') and ($perfil_id == 1))
   {?>
    <ul class="nav avbar-nav mr-auto pr-5">
      <li>
        <a class="nav-link text-light pru" href="<?php echo base_url();?>ventas_resumen">
          <i class="fas fa-cart-arrow-down"></i> Ventas
        </a>  
      </li>
      <li>
        <a class="nav-link text-light pru" href="<?php echo base_url('productos/produc');?>">
          <i class="fas fa-cubes"></i>Productos
        </a>  
      </li>
      <li>
        <a class="nav-link text-light pru" href="<?php echo base_url('usuarios/listado');?>">
          <i class="fas fa-users"></i> Usuarios
        </a>
      </li>

      
    </ul>

    <ul class="nav avbar-nav ml-auto pr-5">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light pru" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-cog"></i>Hola, <?= $nombre ?>
        </a>
        <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item text-dark pru" href="<?php echo base_url('configu');?>">
            <i class="fas fa-cog"></i>Configuración
          </a>
        
          <div class="dropdown-divider"></div>
            <a class="dropdown-item text-dark pru" href="<?php echo base_url('logout');?>">
              <i class="fas fa-sign-out-alt"></i>Salir
            </a>
          </div>
      </li>
    </ul>
    
  <?php
   } else if (($this->session->userdata('logged_in')) and ($perfil_id == '2'))
    {?>

      <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>nosotros" >Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>comercializacion">Comercialización</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>productos/ver">Productos</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL();?>contacto">Contacto</a>
        </li>
      </ul>

      <ul class="nav navbar-nav ml-auto pr-5">
        <li>
          <a class="nav-link text-light pru" href="<?php echo base_url('carrito');?>">
            <i class="fas fa-cart-plus"></i> 
            Carrito ( <?=$this->cart->total_items();?> )
          </a>

        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-light pru" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-user"></i> Hola, <?= $nombre ?>
          </a>
          <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-dark pru" href="<?php echo base_url('usuarios/mis_compras');?>">
              <i class="fas fa-shopping-bag"></i> Mis Compras
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-dark pru" href="<?php echo base_url('logout');?>">
              <i class="fas fa-sign-out-alt"></i> Salir
            </a>
          </div>
        </li>
      </ul>
        <!-- -------------------------------- FIN NAVBAR PARA CLIENTES -------------------------------- -->


    <?php } else
    { ?>
        <!-- -------------------------------- NAVBAR PARA PUBLICO EN GENERAL -------------------------------- -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>nosotros" >Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>comercializacion">Comercialización</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL(); ?>productos/ver">Productos</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL();?>contacto">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL();?>registro">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL();?>login">Login</a>
        </li>
      </ul>
    <?php } ?>
  </div>
</nav>

