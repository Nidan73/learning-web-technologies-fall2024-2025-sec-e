
function updateCategoryLinks() {
    var selectedCategories = [];
    var selectedCategoryNames = [];
    var checkboxes = document.getElementsByName('category[]');
    var categories = JSON.parse(document.getElementById('categories-data').value);

    console.log(categories);

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            selectedCategories.push(checkboxes[i].value);
            categories.forEach(function(category) {
                if (category.category_id == checkboxes[i].value) {
                    selectedCategoryNames.push(category.name);
                }
            });
        }
    }

    
    var linksContainer = document.getElementById('selected-categories');
    linksContainer.innerHTML = ''; 
    selectedCategories.forEach(function(categoryId, index) {
        var link = document.createElement('li');
        link.innerHTML = '<a href="category_details.php?category_id=' + categoryId + '">' + selectedCategoryNames[index] + '</a>';
        linksContainer.appendChild(link);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.getElementsByName('category[]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateCategoryLinks);
    });
});
