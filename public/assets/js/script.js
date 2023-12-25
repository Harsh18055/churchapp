//Session Time Out For The Admin:
setTimeout(function () {
            document.querySelector('.alert').style.display = 'none';
}, 5000); 
        
//Session Time Out For The Admin Login:
 setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 6000);