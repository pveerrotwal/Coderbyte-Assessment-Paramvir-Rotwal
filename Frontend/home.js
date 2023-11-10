function logout() {
    fetch('logout.php', {
        method: 'POST',
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        alert(data);
        window.location.href = 'login.html';
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function generateID() {
    fetch('generateID.php', {
        method: 'POST',
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const table = document.getElementById("idTable").getElementsByTagName('tbody')[0];
        const row = table.insertRow(-1);
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        cell1.innerHTML = table.rows.length - 1;
        cell2.innerHTML = data.RandomID;
        cell3.innerHTML = data.GeneratedDateTime;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
