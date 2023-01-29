<!DOCTYPE html>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://static.nieks-projecten.nl/FontAwesome/css/all.min.css">
    <script>
        module.exports = {
            mode: 'jit',
            purge: ['./public/**/*.html'],
            darkMode: false, // or 'media' or 'class'
            theme: {
                extend: {
                    padding: {
                        '1/2': '50%',
                        full: '100%',
                    },
                },
            },
            variants: {
                extend: {},
            },
            plugins: [],
        };
    </script>
    <title>The Matrix></title>
</head>
<body>
<div class="bg-gray-100 flex h-screen items-center justify-center">
    <form action="index.php" method="post" class="bg-white p-10 rounded-lg shadow-md w-1/2">
        <div class="mb-4">
            <label class="block text-lg font-bold text-gray-700 mb-2" for="password">
                Password:
            </label>
            <div class="relative">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-cyan-500"
                    id="password"
                    type="password"
                    name="password"
                    required
                />
                <label
                    class="absolute top-0 right-0 mt-1 mr-2 cursor-pointer"
                    for="password-visibility"
                >
                    <input
                        type="checkbox"
                        class="hidden"
                        id="password-visibility"
                        name="password-visibility"
                    />
                </label>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-50 ease-in-out"
                type="submit"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>
                Submit
            </button>
        </div>
    </form>
</div>



</body>
</html>