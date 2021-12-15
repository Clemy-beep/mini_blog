function getCat() {
    $.ajax({
        type: "GET",
        url: "http://127.0.0.3/model/forumCategoriesModel.php",
        dataType: "json",
        success: function(response) {
            console.log(response);
            displayCat(response);
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

getCat();

function displayCat(categories) {
    if (categories.length > 0) {
        categories.forEach(category => {
            $('aside').append(`<a class="category" href="#">${category.category_title}</a>`);
        });
    }
}