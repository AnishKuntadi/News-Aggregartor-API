document.getElementById('login-form').addEventListener('submit', function (event) {
    event.preventDefault();  // Prevent form submission

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Sending the login request
    axios.post('/api/login', {
        email: email,
        password: password
    })
    .then(response => {
        console.log('Response:', response.data);  // Log full response for debugging
        if (response.data && response.data.data && response.data.data.token) {
            localStorage.setItem('access_token', response.data.data.token);
            console.log('Logged in successfully');
            // Redirect to news page
            window.location.href = '/news';  
            console.error('Token not found in response');
        }
    })
    .catch(error => {
        console.log('Login failed:', error);
        alert('Login failed! Please check your credentials or try again later.');
    });
});

// Ensure this script runs after the DOM is fully loaded or place it in your main JS file
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
