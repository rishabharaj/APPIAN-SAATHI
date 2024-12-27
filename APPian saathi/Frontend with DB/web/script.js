document.addEventListener('DOMContentLoaded', () => {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const targetId = event.target.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            targetSection.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Contact form submission simulation
    const contactForm = document.querySelector('form');

    contactForm.addEventListener('submit', event => {
        event.preventDefault();

        const formData = new FormData(contactForm);
        const name = formData.get('name');
        const email = formData.get('email');
        const message = formData.get('message');

        if (name && email && message) {
            alert(`Thank you, ${name}! Your message has been received.`);
            contactForm.reset();
        } else {
            alert('Please fill out all fields before submitting.');
        }
    });
});
    const profileLink = document.getElementById('profile-link');
        const signupModal = document.getElementById('signup-modal');
        const closeModal= document.getElementById('close-modal');

        profileLink.addEventListener('click', () => {
            signupModal.style.display = 'flex';
        });

        closeModal.addEventListener('click', () => {
            signupModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === signupModal) {
                signupModal.style.display = 'none';
            }
        });
    // Get the "Home" link by its ID
const HomeLink = document.getElementById('Home-link');

// Add a click event listener
HomeLink.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default link behavior
    window.location.href = 'Home.html'; // Navigate to the home.html page
});

const AboutLink = document.getElementById('about-link')
AboutLink.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default link behavior
    window.location.href = 'about.html'; // Navigate to the home.html page
});
