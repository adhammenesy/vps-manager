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