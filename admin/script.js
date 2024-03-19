//JavaScript for the sidemenu Toggle effect

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('togglebtn');
    const navItems = document.querySelectorAll('.nav-item');

    toggleBtn.addEventListener('click', function () {
        const sidebarLeft = parseInt(window.getComputedStyle(sidebar).left);

        if (sidebarLeft >= 0) {
            sidebar.style.left = '-250px';
            navItems.forEach(item => item.classList.add('collapsed'));
        } else {
            sidebar.style.left = '0';
            navItems.forEach(item => item.classList.remove('collapsed'));
        }
    });

    document.getElementById('togglebtn').addEventListener('click', function () {
        document.getElementById('content').classList.toggle('left-collapsed');
    });
});

//Javascript for the user toggle menu

document.getElementById("user-icon").addEventListener("mouseover", function() {
    var dropdown = document.getElementById("user-dropdown");
    dropdown.classList.add("show");
  });
  
  document.getElementById("user-icon").addEventListener("mouseout", function() {
    var dropdown = document.getElementById("user-dropdown");
    dropdown.classList.remove("show");
  });
  
  