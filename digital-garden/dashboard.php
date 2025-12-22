<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /digital-garden/digital-garden/log-in.php');
    exit;
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Digital Garden</title>
    <link href="../src/output.css" rel="stylesheet" />
    <link href="../src/custom.css" rel="stylesheet" />
    <script src="../public/index.js" defer></script>
</head>
<body class="bg-green-300 antialiased h-screen">

    <?php include '../includes/header.php'; ?>

    <main class="flex items-center justify-center min-h-screen px-6">
        <section class="w-full max-w-5xl bg-neutral-primary-soft p-8 rounded-sm shadow-xs border border-default">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:flex-1">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-heading mb-4">Welcome back, <?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?></h1>
                    <p class="text-body mb-6">This is your dashboard â€” access your notes, themes and account settings from here.</p>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="create.php" class="inline-block text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none">Create note</a>
                        <a href="notes.php" class="inline-block text-green-900 bg-green-200 border border-default-medium hover:bg-green-300 ease-in-out transition-colors duration-300 font-medium leading-5 text-sm px-4 py-2.5 text-center">My notes</a>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <div class="w-full max-w-sm mx-auto bg-green-200 border border-default-medium p-4 rounded-sm">
                        <h3 class="text-lg font-semibold text-heading mb-3">Quick actions</h3>
                        <p class="text-sm text-body mb-4">Create new notes or manage your categories and themes.</p>
                        <a href="notes.php" class="block text-center text-white bg-green-800 box-border border border-transparent hover:bg-green-900 ease-in-out transition-colors duration-300 shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none">View notes</a>
                    </div>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-4 bg-neutral-primary-soft rounded shadow border border-default">
                    <h4 class="font-semibold text-heading mb-2">My Notes</h4>
                    <p class="text-sm text-body">Quick link to manage your notes.</p>
                    <a href="notes.php" class="text-fg-brand mt-2 inline-block">Open</a>
                </div>
                <div class="p-4 bg-neutral-primary-soft rounded shadow border border-default">
                    <h4 class="font-semibold text-heading mb-2">Themes</h4>
                    <p class="text-sm text-body">Customize your dashboard appearance.</p>
                    <a href="themes.php" class="text-fg-brand mt-2 inline-block">Manage</a>
                </div>
                <div class="p-4 bg-neutral-primary-soft rounded shadow border border-default">
                    <h4 class="font-semibold text-heading mb-2">Account</h4>
                    <p class="text-sm text-body">Update your profile and settings.</p>
                    <a href="profile.php" class="text-fg-brand mt-2 inline-block">Edit</a>
                </div>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>

</body>
</html>