<?php include "../config/database.php";
if (isset($_POST["register"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm = $_POST["confirm"];

  if ($password === $confirm) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    if ($stmt->execute()) {
      header("Location: log-in.php");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create account â€” Digital garden</title>
  <link href="../src/output.css" rel="stylesheet" />
  <script src="../public/index.js" defer></script>
	<link href="../src/custom.css" rel="stylesheet" />
</head>

<body class="bg-green-300 h-screen ">

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

  <form action="auth.php" method="post">
    <input type="hidden" name="action" value="register">
    <h5 class="text-xl font-semibold text-heading mb-6">Create account</h5>

    <div class="mb-4">
      <label for="username" class="block mb-2.5 text-sm font-medium text-heading">Username</label>
      <input type="text" name="username" id="username" required
        class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
        placeholder="your-username" />
    </div>

    <div class="mb-4">
      <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
      <input type="email" name="email" id="email" required
        class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
        placeholder="example@company.com" />
    </div>

    <div class="mb-4">
      <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Password</label>
      <input type="password" name="password" id="password" required
        class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
        placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢" />
    </div>

    <div class="mb-4">
      <label for="confirm" class="block mb-2.5 text-sm font-medium text-heading">Confirm password</label>
      <input type="password" name="confirm" id="confirm" required
        class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
        placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢" />
    </div>

    <input name='register' type="submit"
      class="text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none w-full mb-3">



    <div class="text-sm font-medium text-body">
      Already have an account?
      <a href="log-in.php" class="text-fg-brand hover:underline">Log in</a>
    </div>
  </form>
  </div>
  </section>

  <?php include '../includes/footer.php'; ?>
</body>

</html>