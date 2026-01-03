function showCategory(category) {
    alert('You selected the ${category} category.');
    // Here, you can add functionality to display products specific to the category
}

// Search Functionality (Placeholder)
function searchProducts() {
    const query = document.getElementById('search-bar').value.toLowerCase();
    console.log('Searching for:', query);
    // Implement actual product search logic here
}

// Open Modals with Overlay
// Open Modals with Overlay
function openSignInModal() {
    document.getElementById('sign-in-modal').style.display = 'block';
    document.querySelector('.modal-overlay').style.display = 'block';
}

function openSignUpModal() {
    document.getElementById('sign-up-modal').style.display = 'block';
    document.querySelector('.modal-overlay').style.display = 'block';
}

// Close Modals with Overlay
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.querySelector('.modal-overlay').style.display = 'none';
}

// Example Sign In Form Submission
document.getElementById('sign-in-form')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('signin-email').value;
    const password = document.getElementById('signin-password').value;
    console.log('Sign In:', email, password);
    closeModal('sign-in-modal');
});

// Example Sign Up Form Submission
document.getElementById('sign-up-form')?.addEventListener('submit', function (e) {
    const password = document.getElementById('signup-password').value;
    const confirmPassword = document.getElementById('signup-confirm-password').value;

    if (password !== confirmPassword) {
        e.preventDefault(); // Prevent submission only if passwords do not match
        alert('Passwords do not match');
        return;
    }

    // If passwords match, the form will submit to signup.php
});

