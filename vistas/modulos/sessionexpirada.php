<body class="hold-transition sidebar-mini bg-accpunt-pages" style="height: auto;">

<?php  

echo
		'<script type="text/javascript">
				$(document).ready(function() {
					swal({ 
					
					title: "Oops..",
					text: "Tu Sesión ha Expirado!",
					footer: "Tiempo de Inactividad 10 Minutos...",
					type: "info",
					showConfirmButton: true,
					//timer: 2500

				}).then(function() {
				// Redirect the user
				window.location.href = "login";
				})
				},200);
			</script>';

session_destroy();

	

?>

</body>