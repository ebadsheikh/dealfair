const toggleNotificationButton = document.getElementById("toggleNotificationButton");
const toggleDiv = document.getElementById("toggleDiv");
const closeNotification = document.getElementById("closeNotification");

toggleNotificationButton.addEventListener("click", function(event) {
    event.stopPropagation(); // Prevent event from bubbling to document
    toggleDiv.style.display = toggleDiv.style.display === "none" ? "block" : "none";
});

closeNotification.addEventListener("click", function() {
    toggleDiv.style.display = "none";
});

document.addEventListener("click", function(event) {
    if (!toggleDiv.contains(event.target) && event.target !== toggleNotificationButton) {
        toggleDiv.style.display = "none";
    }
});
