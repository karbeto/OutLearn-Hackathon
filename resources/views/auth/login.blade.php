<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Green Themed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-white via-green-100 to-green-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-green-700 text-center mb-6">Welcome</h2>

        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" class="mr-2">
                    Remember me
                </label>
                <a href="#" class="text-sm text-green-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Login</button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-4">
            Don't have an account? 
            <a href="/register" class="text-green-600 hover:underline">Sign Up</a>
        </p>
    </div>

</body>
</html>
