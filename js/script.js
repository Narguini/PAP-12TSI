window.onload = function() {
    document.querySelectorAll('#deleteForm').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const confirmed = confirm('Are you sure want to delete this user? THIS ACTION CANNOT BE UNDONE!');
            if (!confirmed) {
                return false;
            }

            form.action = "../../actions/deleteUser.php"; // Set the action here
            form.submit();
        });
    });
}