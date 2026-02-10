// Mobile Sidebar Fix for Admin Panel
// This file ensures sidebar and backdrop work correctly on mobile devices
// Uses the CSS classes defined in admin.blade.php for state management

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('admin-sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const trigger = document.getElementById('hamburger-trigger');

    // Helper to close sidebar
    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('show');
        if (backdrop) {
            backdrop.classList.remove('show');
            backdrop.classList.remove('show-start'); // Ensure display:none kicks in after transition
            // Wait for transition, then force display none if needed (though CSS handles it)
            setTimeout(() => {
                if (!backdrop.classList.contains('show')) {
                    backdrop.style.display = 'none';
                }
            }, 300);
        }
        if (trigger) trigger.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Initialize state
    function resetMobileState() {
        if (window.innerWidth < 1024) {
            closeSidebar();
        } else {
            // Desktop reset
            if (sidebar) sidebar.classList.remove('show'); 
            if (backdrop) {
                backdrop.classList.remove('show');
                backdrop.style.display = 'none'; // Force hide on desktop
            }
            document.body.style.overflow = '';
        }
    }

    resetMobileState();

    // Auto-close on link click
    const sidebarLinks = document.querySelectorAll('#admin-sidebar a[href]');
    sidebarLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 1024) closeSidebar();
        });
    });

    // Handle resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(resetMobileState, 250);
    });

    // Expose Global
    window.closeAdminSidebar = closeSidebar;
});

// Global Toggle Function
window.toggleMobileSidebar = function() {
    const sidebar = document.getElementById('admin-sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const trigger = document.getElementById('hamburger-trigger');

    // Check if open by checking the 'show' class
    const isOpen = sidebar.classList.contains('show');

    if (isOpen) {
        // CLOSE
        sidebar.classList.remove('show');
        if (backdrop) {
            backdrop.classList.remove('show');
            setTimeout(() => {
                backdrop.style.display = 'none';
            }, 300);
        }
        trigger.classList.remove('active');
        document.body.style.overflow = '';
    } else {
        // OPEN
        sidebar.classList.add('show');
        if (backdrop) {
            backdrop.style.display = 'block';
            // Force reflow
            void backdrop.offsetWidth;
            backdrop.classList.add('show');
        }
        trigger.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
};
