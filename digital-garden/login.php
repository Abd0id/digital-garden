<?php
session_start();
include("../config/database.php");

$form_errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'login') {
	$identifier = trim($_POST['identifier'] ?? '');
	$password = $_POST['password'] ?? '';

	if ($identifier === '') {
		$form_errors[] = 'Please enter your username or email.';
	}
	if ($password === '') {
		$form_errors[] = 'Please enter your password.';
	}

	if (empty($form_errors)) {
		if (!isset($conn) || $conn->connect_error) {
			error_log('DB connection error in log-in.php: ' . ($conn->connect_error ?? 'no connection'));
			$form_errors[] = 'Database connection failed.';
		} else {
			$query = "SELECT * FROM users WHERE email = ? OR username = ? LIMIT 1";
			$stmt = $conn->prepare($query);
			if ($stmt) {
				$stmt->bind_param('ss', $identifier, $identifier);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result && $result->num_rows === 1) {
					$user = $result->fetch_assoc();
					if (password_verify($password, $user['password_hash'])) {
						// Set session values used elsewhere
						$_SESSION['user_id'] = $user['id'];
						$_SESSION['name'] = $user['username'];
						$_SESSION['email'] = $user['email'];
						header('Location: /digital-garden/digital-garden/dashboard.php');
						exit();
					} else {
						$form_errors[] = 'Incorrect password.';
					}
				} else {
					$form_errors[] = 'No account found with that username or email.';
				}
				$stmt->close();
			} else {
				error_log('Prepare failed in log-in.php: ' . $conn->error);
				$form_errors[] = 'Database error.';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Log in â€” Digital garden</title>
	<link href="../src/output.css" rel="stylesheet" />
	<link href="../src/custom.css" rel="stylesheet" />
	<script src="../public/index.js" defer></script>
</head>

<body class="bg-green-300 h-screen">

	<?php include '../includes/header.php'; ?>

	<section class="flex justify-center items-center h-screen">
		<div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default shadow-xs">
			<?php if (!empty($form_errors)): ?>
				<div class="mb-4 text-sm text-red-700">
					<?php foreach ($form_errors as $err): ?>
						<div>- <?= htmlspecialchars($err) ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<form action="log-in.php" method="post">
				<input type="hidden" name="action" value="login">
				<h5 class="text-xl font-semibold text-heading mb-6">Log in</h5>
				<div class="mb-4">
					<label for="identifier" class="block mb-2.5 text-sm font-medium text-heading">Username or
						email</label>
					<input type="text" name="identifier" id="identifier"
						class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
						placeholder="username or email" required />
				</div>
				<div>
					<label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
					<input type="password" name="password" id="password"
						class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
						placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢" required />
				</div>
				<br />
				<input type="submit"
					class="text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none w-full mb-3">

				<div class="text-sm font-medium text-body">
					Not registered?
					<a href="register.php" class="text-fg-brand hover:underline">Create account</a>
				</div>
			</form>
		</div>
	</section>

	<?php include '../includes/footer.php'; ?>
</body>

</html>