document.getElementById('sidebarToggle').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('show');
    document.getElementById('sidebarOverlay').classList.toggle('show');
});

// Close sidebar when clicking overlay on mobile
document.getElementById('sidebarOverlay').addEventListener('click', function () {
    document.getElementById('sidebar').classList.remove('show');
    this.classList.remove('show');
});

// Sidebar collapse toggle (desktop)
document.getElementById('toggleCollapse').addEventListener('click', function () {
    document.body.classList.toggle('sidebar-collapsed');

    // Change icon based on state
    const icon = this.querySelector('i');
    if (document.body.classList.contains('sidebar-collapsed')) {
        icon.className = 'bi bi-chevron-right';
    } else {
        icon.className = 'bi bi-chevron-left';
    }
});

// Active link handling
document.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', function (e) {
        if (!this.classList.contains('dropdown-toggle')) {
            document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            // On mobile, close sidebar after clicking a link
            if (window.innerWidth < 768) {
                document.getElementById('sidebar').classList.remove('show');
                document.getElementById('sidebarOverlay').classList.remove('show');
            }
        }
    });
});

// Close sidebar when window is resized to desktop
window.addEventListener('resize', function () {
    if (window.innerWidth >= 768) {
        document.getElementById('sidebar').classList.remove('show');
        document.getElementById('sidebarOverlay').classList.remove('show');
    }
});