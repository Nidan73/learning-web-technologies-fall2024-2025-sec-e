document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById('addCategoryForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var name = document.getElementById('name').value.trim();
        var description = document.getElementById('description').value.trim();

        
        if (name === '' || description === '') {
            alert('Please fill in all fields.');
            return;
        }

    
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/categoryController.php', true);
        xhttp.setRequestHeader('Content-Type', 'application/json');

      
        xhttp.onload = function() {
            var response = JSON.parse(xhttp.responseText);
            if (response.success) {
                alert('Category added successfully!');
                location.reload(); 
            } else {
                alert('Error adding category: ' + response.message);
            }
        };


        xhttp.send(JSON.stringify({ add: true, name: name, description: description }));
    });
    
    document.getElementById('categoryList').addEventListener('click', function(event) {
        var target = event.target;
        var categoryId = target.getAttribute('data-id');

        if (target.classList.contains('edit-button')) {
            var name = document.getElementById('name' + categoryId).value.trim();
            var description = document.getElementById('description' + categoryId).value.trim();

         
            if (name === '' || description === '') {
                alert('Please fill in all fields.');
                return;
            }

            
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/categoryController.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/json');

            
            xhttp.onload = function() {
                var response = JSON.parse(xhttp.responseText);
                if (response.success) {
                    alert('Category updated successfully!');
                    location.reload(); 
                } else {
                    alert('Error updating category: ' + response.message);
                }
            };

            // Send data
            xhttp.send(JSON.stringify({ edit: true, category_id: categoryId, name: name, description: description }));
        }

        if (target.classList.contains('remove-button')) {
            // Create XMLHttpRequest object
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/categoryController.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/json');

            // Handle response
            xhttp.onload = function() {
                var response = JSON.parse(xhttp.responseText);
                if (response.success) {
                    alert('Category removed successfully!');
                    location.reload(); // Reload the page to see the updated list
                } else {
                    alert('Error removing category: ' + response.message);
                }
            };

            // Send data
            xhttp.send(JSON.stringify({ remove: true, category_id: categoryId }));
        }
    });
});