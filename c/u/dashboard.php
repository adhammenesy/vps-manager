<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLACK.PUTTY</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex bg-gray-50">
    <nav class="w-64 bg-gray-800 shadow-md h-screen fixed">
        <div class="p-4">
            <h1 class="text-xl font-bold text-white">Dashboard</h1>
        </div>
        <ul class="mt-6">
            <li class="p-4 hover:bg-gray-700"><a 
            class="text-green-700 w-20 p-2 hover:bg-gray-700 "
             href="/c/u/dashboard.php">Home</a></li>
            <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="">Settings</a></li>
            <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="/">Profile</a></li>
            <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="/">Logout</a></li>
        </ul>
    </nav>
    <main class="flex-1 p-6 ml-96">
        <h2 class="text-2xl font-bold text-gray-800">Welcome to your Dashboard</h2>
        <p class="mt-4 text-gray-600">Here you can manage your Virtual Private Server (Vps), Remote Desktop Protocol (RDP) connections.</p>

        <div class="container flex justify-end">
            <button id="openModal" class="bg-green-500 text-white rounded px-4 py-2 mt-5">Add Connection</button>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-900">My Connections</h3>
            <table class="w-full mt-4">
                <thead>
                    <tr>
                        <th class="text-left text-gray-700">Id</th>
                        <th class="text-left text-gray-700">IP</th>
                        <th class="text-left text-gray-700">Port</th>
                        <th class="text-left text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody id="vpsList">
                </tbody>
            </table>
        </div>

        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">Complete The Form To Add A New Vps Connection</h2>
            <form id="vpsForm" action="/Backside/Connection.new.php" method="POST">
                <input type="text" id="ip" name="ip" placeholder="IP Address" class="border rounded p-2 mb-4 w-full" required focus />
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
    </main>
    <script src="dashboard.js"></script>
    <script>
        displayVpsList();
    </script>
</body>
</html>