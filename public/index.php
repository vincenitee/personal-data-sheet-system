<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body class="flex min-h-screen items-center justify-center bg-slate-200">

    <!-- login container -->
    <div class="w-[25%] rounded-md border bg-white px-3 py-2">
        <form action="./assets/database/login.php" method="post" class="space-y-3">
            <?php
            if (isset($_GET['login'])) {
                $error = $_GET['login'];
                if ($error == 0) {
                    echo "<h5 class='text-xs p-1 bg-red-200 text-red-500'> Login Failed </h5>";
                }
            }
            ?>
            <div class="flex flex-col items-center space-y-1 border-b border-slate-500 p-1">
                <div class="m-auto rounded-full border-2 p-2 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13.5H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-medium text-slate-700">Login</h2>
            </div>
            <div class="group relative space-y-1">
                <select name="role" id="role" class="dropdown" required>
                    <option value=""></option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                <label class="pointer-events-none absolute inset-x-2 inset-y-2 text-sm text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Login as</label>
            </div>
            <div class="group relative">
                <input type="text" name="username" id="username" class="address-inputbox" autocomplete="off" required />
                <label class="pointer-events-none absolute inset-x-2 inset-y-3 text-sm text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Username</label>

            </div>

            <div class="group relative">
                <input type="password" name="password" id="password" class="address-inputbox" autocomplete="off" required />
                <label class="pointer-events-none absolute inset-x-2 inset-y-3 text-sm text-gray-500 transition-all duration-100 ease-in group-focus-within:inset-y-0 group-focus-within:text-xs">Password</label>
            </div>

            <button class="w-full rounded-sm bg-blue-500 py-2 text-white ring-blue-500 hover:bg-blue-600 hover:ring-2 active:bg-blue-800">Login</button>
        </form>
    </div>

    <?php
    if (isset($_GET['logout'])) {
        $logout = $_GET['logout'];
    }

    if (isset($logout) && $logout == true) {
        echo "<script>
                alert('Logout Successfull')
                window.location = 'index.php';
                </script>";
    }
    ?>
</body>

</html>