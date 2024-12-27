async function GetVpsList() {
    try {
        const response = await fetch('/Backside/MyConnections.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching VPS list:', error.message);
    }
}


async function displayVpsList() {
    const data = await GetVpsList();
    const vpsList = document.getElementById('vpsList');

    if (Array.isArray(data)) {
        vpsList.innerHTML = '';

        data.forEach((vps) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="text-gray-800">${vps.id}</td>
                <td class="text-gray-800">${vps.ip}</td>
                <td class="text-gray-800">${vps.port}</td>
                <td class="flex space-x-4">
                    <button data-id="${vps.id}" onClick="window.location.href='control.php?id=${vps.id}'" class="bg-blue-600 text-white rounded px-4 py-2">Control</button>
                    <button data-id="${vps.id}" onClick="DeleteConnection(${vps.id})" class="bg-red-600 text-white rounded px-4 py-2">Delete</button>
                </td>
            `;
            vpsList.appendChild(tr);
        });
    } else {
        console.error('Data is not an array:', data);
    }
}


async function DeleteConnection(id) {
    console.log(id);

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/Backside/DeleteConnection.php';
    form.style.display = 'none';

    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;

    form.appendChild(input);
    document.body.appendChild(form);

    const res = await new Promise((resolve) => {
        form.submit();
        vpsList.innerHTML = '';
        displayVpsList();
    });

    const vpsList = document.getElementById('vpsList');
    const data = await res.json();
    if (data.error) {
        alert(data.error);
    } else {
        vpsList.innerHTML = '';
        displayVpsList();
    }
}


async function GetConnectionById(id) {
    const data = await GetVpsList();
    return data.find((vps) => parseInt(vps.id) === parseInt(id));
}