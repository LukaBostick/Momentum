<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Momentum</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

		<!-- Styles / Scripts -->
		<link href="/resources/css/app.css" rel="stylesheet" />
	</head>
	<body class="bg-gray-200">
		<div id="app">
			<nav class="bg-white ">
				<div class="container mx-auto">
					<div class="flex justify-between items-center py-2o">
						<h1>
							<a class="navbar-brand" href="/">
								<img src="/resources/views/layouts/public/images/logo.png" alt="WeHack">
							</a>
						</h1>
						<div>
							<!-- Right Side Of Navbar -->
							<ul class="navbar-nav ms-auto">
								<!-- Authentication Links -->
								<?php if (!$GLOBALS["account"]) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/register">Register</a>
                                </li>
								<?php } else { ?>
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo "Username here" ?>
									</a>

									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="/logout">Logout</a>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</nav>

			<main class="container mx-auto py-4">
