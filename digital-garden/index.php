<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Digital garden</title>
	<link href="../src/output.css" rel="stylesheet" />
	<link href="../src/floating-cards.css" rel="stylesheet" />
	<script src="../public/index.js" defer></script>
</head>

<body
 	class="bg-green-300 antialiased bg-linear-to-b from-0% dark:from-brand/8 from-neutral-secondary to-[48rem] to-primary h-screen">

	<?php include '../includes/header.php'; ?>

	<main class="flex items-center justify-center min-h-screen px-6">
		<section class="w-full max-w-5xl bg-neutral-primary-soft p-8 rounded-sm shadow-xs border border-default">
			<div class="flex flex-col md:flex-row items-center gap-8">
				<div class="md:flex-1">
					<h1 class="text-3xl md:text-4xl font-extrabold text-heading mb-4">Grow ideas, not noise</h1>
					<p class="text-body mb-6">A place to capture notes, link thoughts, and cultivate a personal
						knowledge garden.</p>
					<div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
						<a href="log-in.php"
							class="inline-block text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none">Log
							in</a>
						<a href="register.php"
							class="inline-block text-green-900 bg-green-200 border border-default-medium hover:bg-green-300 ease-in-out transition-colors duration-300 font-medium leading-5 text-sm px-4 py-2.5 text-center">Create
							account</a>
					</div>
				</div>

				<div class="md:w-1/2">
					<div class="w-full max-w-sm mx-auto bg-green-200 border border-default-medium p-4 rounded-sm">
						<h3 class="text-lg font-semibold text-heading mb-3">Quick preview</h3>
						<p class="text-sm text-body mb-4">Log in to access your notes and start linking ideas visually.
						</p>
						<a href="log-in.php"
							class="block text-center text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none">Login</a>
					</div>
				</div>
			</div>
		</section>
	</main>


	<!--Start Background Animation Body-->
	<div class="area">
				<ul class="circles">
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<div class="card-head"></div>
								<div class="card-body">
									<div class="card-line"></div>
									<div class="card-subline"></div>
								</div>
							</div>
						</li>
				</ul>
	</div>
	<!--End Background Animation Body-->
	<?php include '../includes/footer.php'; ?>
</body>

</html>