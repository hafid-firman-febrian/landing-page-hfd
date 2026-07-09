import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

// Toggle menu mobile
const menuToggle = document.querySelector("[data-menu-toggle]");
const menu = document.querySelector("[data-menu]");

menuToggle?.addEventListener("click", () => menu?.classList.toggle("hidden"));

// Tutup menu setelah klik link (mobile)
menu?.querySelectorAll("a").forEach((link) =>
    link.addEventListener("click", () => menu.classList.add("hidden")),
);

// Home: selalu scroll mentok ke paling atas halaman
document.querySelectorAll('a[href="#hero"]').forEach((link) =>
    link.addEventListener("click", (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: "smooth" });
    }),
);

// Scrollspy: tandai link navbar yang section-nya sedang terlihat
const navLinks = Array.from(
    document.querySelectorAll(
        'header nav a[href^="#"], [data-menu] a[href^="#"]',
    ),
).filter((link) => !link.classList.contains("bg-accent"));

const linksBySection = navLinks.reduce((map, link) => {
    const id = link.getAttribute("href").slice(1);
    (map[id] ||= []).push(link);
    return map;
}, {});

const activeClasses = ["text-primary", "font-semibold"];

const setActive = (id) => {
    navLinks.forEach((link) => link.classList.remove(...activeClasses));
    (linksBySection[id] || []).forEach((link) =>
        link.classList.add(...activeClasses),
    );
};

const sections = Object.keys(linksBySection)
    .map((id) => document.getElementById(id))
    .filter(Boolean);

if (sections.length) {
    const spy = new IntersectionObserver(
        (entries) => {
            entries
                .filter((entry) => entry.isIntersecting)
                .forEach((entry) => setActive(entry.target.id));
        },
        { rootMargin: "-45% 0px -45% 0px", threshold: 0 },
    );
    sections.forEach((section) => spy.observe(section));
}

import AOS from "aos";

AOS.init({
    once: true,
    duration: 900,
    offset: 100,
});
