document.addEventListener("DOMContentLoaded", function() {
    // Set a timeout to fade out the alert after 10 seconds (10000 milliseconds)
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        successMessage.style.opacity = '0'; // Start fading out

        // After the fade out transition (0.5s), completely remove the alert from the DOM
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 500); 
    }, 3000); // Display for 10 seconds
});
