const toggleCartButton = document.getElementById("toggleCartButton");
const toggleCartDiv = document.getElementById("toggleCartDiv");
const closeCart = document.getElementById("closeCart");

toggleCartButton.addEventListener("click", function(event) {
    event.stopPropagation(); // Prevent event from bubbling to document
    toggleCartDiv.style.display = toggleCartDiv.style.display === "none" ? "block" : "none";
});

closeCart.addEventListener("click", function() {
    toggleCartDiv.style.display = "none";
});

document.addEventListener("click", function(event) {
    if (!toggleCartDiv.contains(event.target) && event.target !== toggleCartButton) {
        toggleCartDiv.style.display = "none";
    }
});
