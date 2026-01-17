AOS.init({
    duration: 1000,
    once: true
});

// =========================
// DRAGGABLE SKILLS MARQUEE
// =========================
const marquee = document.getElementById("skillsMarquee");
const track = marquee.querySelector(".skills-track");

let isDown = false;
let startX;
let scrollLeft;

// disable animation while dragging
const stopAnimation = () => {
    track.style.animationPlayState = "paused";
};

const startAnimation = () => {
    track.style.animationPlayState = "running";
};

// Mouse events
marquee.addEventListener("mousedown", (e) => {
    isDown = true;
    marquee.classList.add("active");
    startX = e.pageX;
    stopAnimation();
});

window.addEventListener("mouseup", () => {
    isDown = false;
    startAnimation();
});

window.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    const walk = (e.pageX - startX) * 1.2;
    track.style.transform = `translateX(${walk}px)`;
});

// Touch events (mobile)
marquee.addEventListener("touchstart", (e) => {
    startX = e.touches[0].pageX;
    stopAnimation();
});

marquee.addEventListener("touchmove", (e) => {
    const walk = (e.touches[0].pageX - startX) * 1.2;
    track.style.transform = `translateX(${walk}px)`;
});

marquee.addEventListener("touchend", () => {
    startAnimation();
});
const form = document.getElementById("contactForm");
const statusText = document.getElementById("formStatus");
const submitBtn = form.querySelector(".submit-btn");

form.addEventListener("submit", function (e) {
    e.preventDefault(); // sahifa yangilanmasin

    // loading holat
    submitBtn.innerText = "Sending...";
    submitBtn.disabled = true;
    statusText.innerText = "";
    statusText.style.color = "#00e5ff";

    // fake request (backend yo‘q)
    setTimeout(() => {
        statusText.innerText = "✅ Message sent successfully!";
        submitBtn.innerText = "Send Message";
        submitBtn.disabled = false;
        form.reset();
    }, 1500);
});
