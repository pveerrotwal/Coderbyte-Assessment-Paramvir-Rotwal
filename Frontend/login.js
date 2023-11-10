function login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&password=${password}`,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        alert(data);
        // Optionally redirect to home page after successful login
        window.location.href = 'home.html';
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
