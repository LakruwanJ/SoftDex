function toggleFields() {
    var categoryRadios = document.getElementsByName("category");
    var selectedCategory;

    for (var i = 0; i < categoryRadios.length; i++) {
        if (categoryRadios[i].checked) {
            selectedCategory = categoryRadios[i].value;
            break;
        }
    }

    var developerFields = document.getElementById("developerFields");
    var userFields = document.getElementById("userFields");

    developerFields.style.display = "none";
    userFields.style.display = "none";

    if (selectedCategory === "developer") {
        developerFields.style.display = "block";
    } else if (selectedCategory === "user") {
        userFields.style.display = "block";
    }
}






