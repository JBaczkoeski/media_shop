document.addEventListener('DOMContentLoaded', (event) => {
    const dropdownButton = document.querySelector('.dropdown-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownButton.addEventListener('click', (event) => {
        event.stopPropagation();
        const isHidden = dropdownMenu.style.display === 'none';
        dropdownMenu.style.display = isHidden ? 'block' : 'none';
    });

    document.addEventListener('click', () => {
        dropdownMenu.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    const dropdownButton = document.querySelector('.ms-dropdown');
    const dropdownMenu = document.querySelector('.mobile-menu');

    dropdownButton.addEventListener('click', (event) => {
        event.stopPropagation();
        const isHidden = dropdownMenu.style.display === 'none';
        dropdownMenu.style.display = isHidden ? 'block' : 'none';
    });

    document.addEventListener('click', () => {
        dropdownMenu.style.display = 'none';
    });
});
