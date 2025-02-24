// Create the loading screen element dynamically using JS
const loadingScreen = document.createElement('div');
loadingScreen.id = 'loading-screen';
loadingScreen.style.position = 'fixed';
loadingScreen.style.top = 0;
loadingScreen.style.left = 0;
loadingScreen.style.width = '100%';
loadingScreen.style.height = '100%';
loadingScreen.style.backgroundColor = 'rgba(255, 255, 255, 0.8)'; // Semi-transparent
loadingScreen.style.display = 'flex';
loadingScreen.style.justifyContent = 'center';
loadingScreen.style.alignItems = 'center';
loadingScreen.style.zIndex = 9999; // Ensure it's above the content

// Create a spinner using Bootstrap classes and add to loading screen
const spinner = document.createElement('div');
spinner.className = 'spinner-border text-primary';
spinner.role = 'status';

const span = document.createElement('span');
span.className = 'visually-hidden';
span.innerText = 'Loading...';

spinner.appendChild(span);
loadingScreen.appendChild(spinner);

// Add the loading screen to the body
document.body.appendChild(loadingScreen);

// Simulate loading process (e.g., wait for resources)
window.addEventListener('load', function () {
    // After page loads, hide the loading screen and show main content
    setTimeout(function () {
        loadingScreen.style.display = 'none';
        const content = document.getElementById('main-content');
        if (content) {
            content.style.display = 'block';
        }
    }, 500); // Adjust delay (in milliseconds) as needed
});