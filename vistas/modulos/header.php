 
 <nav class="main-header navbar navbar-expand fixed-top   bg-white navbar-light border-bottom ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link"><span><i class="fa fa-home fa-lg" aria-hidden="true"></i></span></a>
      </li>
    <!--   <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
     
      <li class="nav-item ">

        <a class="nav-link"  href="#"><span><i class="fa fa-cog  fa-spin fa-fw" aria-hidden="true"></i></span><span class="hiddex-xs text-success"><?php  echo $_SESSION["perfil"];?></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="SalirSistema()"><i class="fa fa-sign-out"></i>Salir</a>
      </li>
     
      
          
    </ul>
  
  </nav>

 

 <script type="text/javascript">
  function SalirSistema(){
    swal({
   title: 'Advertencia',
  text: "Estás seguro de salir del sistema?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'No, Cancelar!',
  confirmButtonText: 'Si, Estoy Seguro!'
  
    }).then((result) => {

  if (result.value) {
   
    // swal(
    //   'Listo!',
    //   'Saliendo...',
    //   'success'
    // )

$(document).ready(function() {
                swal({ 
               
                title: "Listo..",
                text: "Saliendo...",
                type: "success",
                imageUrl: "vistas/img/gif/30.gif",
                showConfirmButton: false,
                timer: 1500

              }).then(function() {
              // Redirect the user
              window.location.href = "salir";
              })
              },1500);

     //setTimeout("location.href='salir'", 1500);

  }
})
        
} 
</script>




 

 