
const mainpageLink = document.getElementById('main-page')
mainpageLink.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default link behavior
    window.location.href = 'index.html'; 
});
