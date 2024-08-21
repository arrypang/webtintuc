document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        successMessage.style.opacity = '0';

        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 500); 
    }, 3000);
});
