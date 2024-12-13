$(document).ready(function() {
    $('#rentalForm').on('submit', function(event) {
        let isValid = true;

        // Validate Full Name
        if ($('#fullName').val().trim() === '') {
            alert('Full Name is required.');
            isValid = false;
        }

        // Validate Email
        const email = $('#email').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email.');
            isValid = false;
        }

        // Prevent submission if not valid
        if (!isValid) {
            event.preventDefault();
        }
    });
});
