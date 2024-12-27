<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLACK.PUTTY</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        window.addEventListener('beforeunload', function(event) {
            event.preventDefault();
            event.returnValue = '';
        });
    </script>
    <script src="Terminal.js"></script>
</head>
<body class="bg-gray-50 flex flex-col lg:flex-row">
<nav class="w-full lg:w-64 bg-gray-800 shadow-md lg:h-screen">
    <div class="p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-white">Control Panel</h1>
        <button id="mobile-menu-button" class="text-white lg:hidden">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <ul id="mobile-menu" class="mt-6 hidden lg:block">
        <li class="p-4 hover:bg-gray-700"><a class="text-green-700 w-20 p-2 hover:bg-gray-700" href="/c/u/dashboard.php">Home</a></li>
        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="/">Settings</a></li>
        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="/">Profile</a></li>
        <li class="p-4 hover:bg-gray-700 cursor-pointer"><a class="text-white" href="/">Logout</a></li>
    </ul>
</nav>

<script>
    document.getElementById('mobile-menu-button').onclick = function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    };
</script>

<div class="flex-1 container mx-auto p-4">
    <h2 class="text-2xl font-bold text-gray-800">Control Panel</h2>
    <p class="mt-4 text-gray-600">Welcome to the Control Panel of your Virtual Private Server (VPS). Here you can control your VPS from here.</p>
    <br><br>
    
    <div class="tabs mt-5 flex space-x-4">
        <button class="tab-button bg-gray-300 text-gray-800 rounded px-4 py-2 hover:bg-blue-600" onclick="showTab('info')">
            Information
        </button>
        <button class="tab-button bg-gray-200 text-gray-800 rounded px-4 py-2 hover:bg-blue-600" onclick="showTab('console')">
            SSH
        </button>
    </div>

    <div id="info" class="tab-content mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-5">Select OS</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="boxx border-2 border-gray-300 p-2">
                <i id="startsystemI" class="fa-brands fa-10x ml-40 text-blue-500"></i>
                <br>
                <button 
                    id="startsystem"
                    class="mt-2 bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600"
                    onclick="alert('Not Available Now')"
                >
                    Transfer To Linux
                </button>
            </div>
            <div class="vps-passwords">
                <h1 class="text-2xl font-bold text-gray-800" style="margin-top: -30px">Password For OS After Reinstallation</h1>
                <form action="">
                    <div class="mb-4">
                        <input type="password" id="password" name="password" placeholder="Password" required class="border rounded p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" required class="border rounded p-2 w-full">
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="devices" name="devices" value="1" class="mr-2">
                        <label for="devices" class="text-gray-700">More than one person can add this cloud device?</label>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="info container ml-6 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="d1">
                    <h1 class="text-2xl font-bold text-gray-800" style="margin-top: -30px">Information</h1>
                    <div class="connect">
                        <div class="mb-4">
                            <label for="ip" class="block text-gray-700 font-bold mb-2">IP:</label>
                            <div class="flex items-center">
                                <input type="text" id="ip" name="ip" placeholder="IP" class="border rounded p-2 w-full" readonly>
                                <i class="fas fa-copy cursor-pointer ml-2" onclick="copyToClipboard('ip')"></i>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="port" class="block text-gray-700 font-bold mb-2">Port:</label>
                            <div class="flex items-center">
                                <input type="text" id="port" name="port" placeholder="Port" class="border rounded p-2 w-full" readonly>
                                <i class="fas fa-copy cursor-pointer ml-2" onclick="copyToClipboard('port')"></i>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                            <div class="flex items-center">
                                <input type="text" id="type" name="type" class="border rounded p-2 w-full" readonly>
                                <i class="fas fa-copy cursor-pointer ml-2" onclick="copyToClipboard('type')"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="motherboard">
                    <div class="mb-4">
                        <label for="cpu" class="block text-gray-700 font-bold mb-2">CPU:</label>
                        <input type="text" id="cpu" name="cpu" placeholder="CPU" class="border rounded p-2 w-full" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="ram" class="block text-gray-700 font-bold mb-2">RAM:</label>
                        <input type="text" id="ram" name="ram" placeholder="RAM" class="border rounded p-2 w-full" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="disk" class="block text-gray-700 font-bold mb-2">Disk:</label>
                        <input type="text" id="disk" name="disk" placeholder="Disk" class="border rounded p-2 w-full" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="console" class="tab-content hidden mt-10">
        <h1 class="text-2xl font-bold text-gray-800">SSH</h1>
        
        <div class="console container ml-6 mt-10">
            <div class="bg-black text-white p-4" style="height: 750px; overflow-y: auto;">
                <div>
                    <input type="text" id="input" name="input" placeholder="Type a command" class="border rounded p-2 w-full" onkeypress="handleCommand(event)">
                </div>
                <div id="output" class="mt-2"></div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(elementId) {
            const input = document.getElementById(elementId);
            input.select();
            document.execCommand('copy');
        }

        function showTab(tabName) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabName).classList.remove('hidden');

            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            document.querySelector(`.tab-button[onclick="showTab('${tabName}')"]`).classList.add('active');
        }
    </script>
</div>

<script src="dashboard.js"></script>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const vpsid = urlParams.get('id');
    let vps;
    (async() => {
        vps = await GetConnectionById(vpsid);
    })();

    setTimeout(() => {
        if(!vps) window.location.href = '/c/u/dashboard.php';
        const startBtn = document.getElementById('startsystem');
        const startIcon = document.getElementById('startsystemI');
        startIcon.classList.remove("fa-windows", "fa-linux");
        startIcon.classList.add(vps.vptype === "linux" ? "fa-linux" : "fa-windows");
        startIcon.classList.add("fa-10x", "ml-40", "text-blue-500");
        startBtn.innerHTML = "Transfer To " + (vps.vptype === "linux" ? "Windows" : "Linux");
        
        const Type = document.getElementById('type');
        const Port = document.getElementById('port');
        const Ip = document.getElementById('ip');
        Ip.value = vps.ip;
        Port.value = vps.port;
        Type.value = vps.vptype;

        const cpu = document.getElementById('cpu');
        const ram = document.getElementById('ram');
        const disk = document.getElementById('disk');
        cpu.value = vps.cpu + " Core";
        ram.value = vps.ram + " GB";
        disk.value = vps.disk + " GB";
    }, 500);

    async function handleCommand(event) {
        if (event.key === 'Enter') {
            const input = document.getElementById('input');
            const output = document.getElementById('output');
            const command = input.value;
            input.value = '';
            output.innerHTML += '<div class="command">' + command + '</div>';
            output.innerHTML += '<div class="output">' + await ExecuteCommand(command, vps.port) + '</div>';
        }
    }

    async function ExecuteCommand(command, port) {
        const ter = await new Terminal(port).init(command, vps);
        return ter.reply ? (ter.error ? `<p class="text-red-500">${ter.reply}</p>` : `<p class="text-green-500">${ter.reply.replaceAll("\n", "<br>")}</p>`) : console.log(ter);
    }
</script>
</body>
</html>