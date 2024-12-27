function AddVps() {
    document.getElementById('modal').classList.add('hidden');
    const ip = document.getElementById('ip').value;
    const port = document.getElementById('port').value;
    console.log(ip, port);

    if (!ip || !port) {
        return alert("IP and Port are required.");
    }

    const Data = {
        "ip": ip,
        "port": port
    }

    fetch('/Backside/Connection.new.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(Data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error parsing JSON:', error.message);
    });
}