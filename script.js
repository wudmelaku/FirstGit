// Get references to all the sections and navigation links
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

// Function to determine which section is currently in view
function getActiveSection() {
    let scrollPosition = window.scrollY;

    for (let section of sections) {
        let sectionTop = section.offsetTop - 50; // Adjust 50 as per your design
        let sectionHeight = section.offsetHeight;

        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            return section.getAttribute('id');
        }
    }
    return null;
}

// Function to update the active link in the navigation bar
function updateActiveNavLink() {
    let activeSectionId = getActiveSection();

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${activeSectionId}`) {
            link.classList.add('active');
        }
    });
}

// Add scroll event listener to update active navigation link
window.addEventListener('scroll', updateActiveNavLink);
