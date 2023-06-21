// isotope js
document.addEventListener('DOMContentLoaded', function() {
    const filtersMenu = document.querySelector('.filters_menu');
    const filtersMenuItems = filtersMenu.querySelectorAll('li');
    
    filtersMenuItems.forEach(function (item) {
      item.addEventListener('click', function () {
        filtersMenuItems.forEach(function (item) {
          item.classList.remove('active');
        });
        item.classList.add('active');
      });
    });
    
  });
  
