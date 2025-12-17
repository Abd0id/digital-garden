<?php

;?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Digital garden</title>
  <link href="../src/output.css" rel="stylesheet" />
  <script src="../public/index.js" defer></script>
</head>

<body
  class="bg-green-300 antialiased bg-linear-to-b from-0% dark:from-brand/8 from-neutral-secondary to-[48rem] to-primary h-screen">

  <?php include '../includes/header.php'; ?>

  <section class="flex justify-center items-center h-screen">
    <div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default shadow-xs">
      <form action="#">
        <h5 class="text-xl font-semibold text-heading mb-6">Sign in</h5>
        <div class="mb-4">
          <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
          <input type="email" id="email"
            class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            placeholder="example@company.com" required />
        </div>
        <div>
          <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
          <input type="password" id="password"
            class="bg-green-200 border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            placeholder="•••••••••" required />
        </div>
        <br />
        <button type="submit"
          class="text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none w-full mb-3">
          Login to your account
        </button>
        <div class="text-sm font-medium text-body">
          Not registered?
          <a href="#" class="text-fg-brand hover:underline">Create account</a>
        </div>
      </form>
    </div>
  </section>

  <?php include '../includes/footer.php'; ?>
</body>

</html>