document.addEventListener("DOMContentLoaded", () => {
    const navItems = document.querySelectorAll(".sidebar-nav .nav-item");
    const currentPath = window.location.pathname;

    navItems.forEach(item => {
        // Check if link href matches current page
        if (item.href.includes(currentPath)) {
            item.classList.add("active");
        }

        // Optional: click handler for instant feedback
        item.addEventListener("click", function() {
            navItems.forEach(link => link.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
