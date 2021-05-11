<!DOCTYPE html>
<html>
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="title" content="@yield( 'metaTitle' ) | Task Manager">
		<meta name="description" content="@yield('metaDescription')" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Title -->
		<title>@yield( 'metaTitle' ) | Task Manager</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ url('/images/icons/favicon.ico') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ url('/images/icons/apple-icon-precomposed.png') }}">

		<!-- jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

		<script type="text/javascript">
			jQuery( document ).ready(function() {
				jQuery( '.datepicker' ).datepicker();

				jQuery( '.trigger-info' ).click( function() {
					var info = jQuery( this ).closest( '.row-task-main' ).next( '.row-task-info' );
					jQuery( '.row-task-info' ).not( info ).hide();

					if( info.is( ':visible' ) ) {
						info.slideUp( 'fast' );
					}
					else {
						info.slideDown( 'slow' );
					}
				});
			});
		</script>

		<style type="text/css">
			.cursor-pointer {
				cursor: pointer;
			}

			.row-task-info {
				display: none;
			}
		</style>
	</head>
	<body>
	<header>
		<div class="p-5 text-center bg-light">
			<h1 class="mb-3">Task Manager</h1>
			<h4 class="mb-3">(Manage Tasks)</h4>
		</div>
	</header>
		<div class="container">
			@yield( 'content' )
		</div>
	</body>
</html>
