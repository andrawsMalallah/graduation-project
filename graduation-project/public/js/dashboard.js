// sidebar
const sidebar = document.querySelector(".sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const sideNavigation = document.getElementById("sideNavigation");
const narrowNav = document.getElementById("narrowNav");
const mainContent = document.getElementById("mainContent");

sidebar.addEventListener("mouseenter", () => {
    sidebar.classList.add("overflow");
});

sidebar.addEventListener("mouseleave", () => {
    sidebar.classList.remove("overflow");
});

sidebarToggle.addEventListener("click", (e) => {
    e.preventDefault();

    sidebar.classList.toggle("active");
    sideNavigation.classList.toggle("active");
    narrowNav.classList.toggle("active");
    mainContent.classList.toggle("wide");
});
