
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager.io</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-blue-600">Welcome to Manager.io</h1>
        <p class="mt-4 text-lg text-gray-700">Your VPS management solution</p>
        <button id="openModalp" onClick="window.location.href='/c/u/dashboard.php';" class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">Get Started</button>
    </div>


    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">Complete The Form To Add A New Vps Connection</h2>
            <form id="vpsForm" action="Backside/Connection.new.php" method="POST">
                <input type="text" id="ip" name="ip" placeholder="IP Address" class="border rounded p-2 mb-4 w-full" required />
                <input type="text" id="port" name="port" placeholder="Port" class="border rounded p-2 mb-4 w-full" required />
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Submit</button>
                    <button id="closeModal" class="bg-red-500 text-white rounded px-4 py-2 ml-2" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openModal').onclick = function() {
            document.getElementById('modal').classList.remove('hidden');
        };
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('modal').classList.add('hidden');
        };
    </script>
    <script src="./Public/Script/Manager.js"></script>
</body>
</html>