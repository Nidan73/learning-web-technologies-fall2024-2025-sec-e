document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('categoryTableBody').addEventListener('click', function(event) {
        var target = event.target;
        var categoryId = target.getAttribute('data-id');
        var adminId = 1; 

        
        if (target.classList.contains('approve-button')) {
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/approve.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/json');

           
            xhttp.onload = function() {
                var response = JSON.parse(xhttp.responseText); 
                if (response.success) {
                    alert('Category approved successfully!');
                    target.closest('tr').remove();
                } else {
                    alert('Error approving category: ' + response.message);
                }
            };

            var data = {
                action: 'approve',
                category_id: categoryId,
                admin_id: adminId
            };
            xhttp.send(JSON.stringify(data));
        }

        
        if (target.classList.contains('reject-button')) {
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/approve.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/json');

            xhttp.onload = function() {
                var response = JSON.parse(xhttp.responseText);  
                if (response.success) {
                    alert('Category rejected successfully!');
                    target.closest('tr').remove(); 
                } else {
                    alert('Error rejecting category: ' + response.message);
                }
            };
            
            var data = {
                action: 'reject',
                category_id: categoryId
            };
            xhttp.send(JSON.stringify(data));
        }
    });
});
