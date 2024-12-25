AOS.init();

//cursor ring
const ring = document.querySelector(".ring");
let mouseX = 0,
    mouseY = 0;

document.addEventListener("mousemove", (e) => {
    mouseX = e.pageX;
    mouseY = e.pageY;

    ring.style.transform = `translate(${mouseX - 15}px, ${
        mouseY - 15
    }px) scale(1.2)`;
});

// light dark mode
$(document).ready(function () {
    if (localStorage.getItem("theme") === "light") {
        $("body").addClass("light-theme");
        $("#theme-toggle i")
            .removeClass("bi-sun-fill")
            .addClass("bi-moon-fill");
        $("#theme-toggle").attr("title", "Switch to Dark Theme");
    } else {
        $("#theme-toggle").attr("title", "Switch to Light Theme");
    }

    $("#theme-toggle").on("click", function () {
        $("body").toggleClass("light-theme");

        const icon = $(this).find("i");
        if ($("body").hasClass("light-theme")) {
            icon.removeClass("bi-sun-fill").addClass("bi-moon-fill");
            localStorage.setItem("theme", "light");
            $(this).attr("title", "Switch to Light Theme");
        } else {
            icon.removeClass("bi-moon-fill").addClass("bi-sun-fill");
            localStorage.setItem("theme", "dark");
            $(this).attr("title", "Switch to dark Theme");
        }
    });
});

$(document).ready(function () {
    const quotes = [
        "Believe in yourself!",
        "Keep pushing forward.",
        "Dream big, work hard.",
        "Success is a journey, not a destination.",
        "Embrace the process.",
        "Stay positive and strong.",
        "You're capable of amazing things!",
        "Every day is a fresh start.",
        "The best is yet to come.",
        "Hard work pays off!",
        "The journey of a thousand miles begins with one step.",
        "Great things never come from comfort zones.",
        "Your potential is endless.",
        "Dream big, start small, but most of all, start!",
        "Every day is a chance to be better.",
        "The best time for new beginnings is now.",
        "Success is the sum of small efforts repeated day in and day out.",
        "Don’t watch the clock; do what it does. Keep going.",
        "Success doesn’t come from what you do occasionally, it comes from what you do consistently.",
        "Your only limit is your mind.",
        "Start where you are, use what you have, do what you can.",
        "Challenges are what make life interesting, and overcoming them is what makes life meaningful.",
        "Believe in the magic of new beginnings.",
    ];

    // Function to get a random quote
    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    if (!sessionStorage.getItem("welcome_shown")) {
        const randomQuote = getRandomQuote();
        $("#random-quote").text(randomQuote);

        $("#welcome-message").removeClass("d-none").addClass("show");

        sessionStorage.setItem("welcome_shown", "true");

        setTimeout(function () {
            $("#welcome-message")
                .removeClass("show")
                .fadeOut(1000, function () {
                    $(this).addClass("d-none");
                });
        }, 8000);
    }
});

$(document).ready(function () {
    $(".progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
    });
});

new TypeIt("#myname", {
    speed: 80,
    loop: true,
    cursorChar: '<span id="cursor">_</span>',
    deleteSpeed: 50,
    startDelay: 1500,
    nextStringDelay: 500,
    lifeLike: true,
    smartBackspace: true,
    waitUntilVisible: true,
})
    .type("Aakash Prajapati")
    .pause(4000)
    .delete()
    .pause(500)
    .type("a web developer")
    .pause(4000)
    .delete()
    .pause(500)
    .go();

    
