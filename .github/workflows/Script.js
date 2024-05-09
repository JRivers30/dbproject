document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('login-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent default form submission
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Using Fetch API to post data to login.php
        fetch('login_form.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.authenticated) {
                alert(data.message);  // Show success message
                window.location.href = 'dashboard.html';  // Redirect to dashboard on success
            } else {
                alert(data.message);  // Show error message on failure
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Login failed due to an error.');  // Handle any other errors
        });
    });

    let startX, startY;

    function handleSwipe(startX, startY, endX, endY) {
        let distX = endX - startX;
        let distY = endY - startY;
        if (Math.abs(distX) > Math.abs(distY)) { // Verify this is a horizontal swipe
            if (distX > 0) {
                navigateRight();
            } else {
                navigateLeft();
            }
        }
    }

    document.addEventListener('mousedown', function(e) {
        startX = e.clientX;
        startY = e.clientY;
    });

    document.addEventListener('mouseup', function(e) {
        handleSwipe(startX, startY, e.clientX, e.clientY);
    });

    function navigateRight() {
        // Example of navigation logic, add or adjust as necessary
        switch (window.location.pathname.split("/").pop()) {
            case 'index.html':
                window.location.href = 'dashboard.html';
                break;
            case 'dashboard.html':
                window.location.href = 'exercises.html';
                break;
            case 'exercises.html':
                window.location.href = 'plans.html';
                break;
            case 'plans.html':
                window.location.href = 'progress.html';
                break;
            // Add more cases as needed
        }
    }

    function navigateLeft() {
        // Example of navigation logic, add or adjust as necessary
        switch (window.location.pathname.split("/").pop()) {
            case 'dashboard.html':
                window.location.href = 'index.html';
                break;
            case 'exercises.html':
                window.location.href = 'dashboard.html';
                break;
            case 'plans.html':
                window.location.href = 'exercises.html';
                break;
            case 'progress.html':
                window.location.href = 'plans.html';
                break;
            // Add more cases as needed
        }
    }
});
