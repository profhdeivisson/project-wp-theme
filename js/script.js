document.addEventListener('DOMContentLoaded', function() {
    var filters = document.querySelectorAll('#filter-section a');
    var projects = document.querySelectorAll('.project-card');
    var hamburger = document.querySelector('.hamburger-menu');
    var menuContainer = document.querySelector('.site-header .container');

    hamburger.addEventListener('click', function() {
        menuContainer.classList.toggle('active');
    });

    filters.forEach(function(filter) {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            var filterType = this.dataset.filter;

            projects.forEach(function(project) {
                if (filterType === 'todos' || project.getAttribute('data-type') === filterType) {
                    project.style.display = 'block';
                } else {
                    project.style.display = 'none';
                }
            });
        });
    });
});
