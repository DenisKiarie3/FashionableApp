// Selects the elements with the IDs 'bar', 'close', and 'navbar'
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

// If the 'bar' element exists, add an event listener to it
if (bar) {
    // On 'bar' click, add the 'active' class to the 'navbar' element
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

// If the 'close' element exists, add an event listener to it
if (close) {
    // On 'close' click, remove the 'active' class from the 'navbar' element
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}