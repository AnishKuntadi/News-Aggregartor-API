document.getElementById('register-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const password_confirmation = document.getElementById('confirm_password').value;

    // Sending the registration request
    axios.post('/api/register', {
        name: name,
        email: email,
        password: password,
        confirm_password: password_confirmation
    })
    .then(response => {
        console.log('Response:', response.data);  // Log full response for debugging
        if (response.data && response.data.data && response.data.data.token) {
            localStorage.setItem('access_token', response.data.data.token);
            console.log('Registered and logged in successfully');
            window.location.href = '/login';  // Redirect to login page after successful registration
        } else {
            console.error('Token not found in response');
        }
    })
    .catch(error => {
        console.log('Registration failed:', error);
        alert('Registration failed! Please check your details or try again later.');
    });
});

// Set the CSRF token for Axios
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
