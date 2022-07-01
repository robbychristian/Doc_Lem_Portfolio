//GSAP
gsap.registerPlugin(ScrollTrigger);

let sections = gsap.utils.toArray(".panel");

gsap.to(sections, {
    xPercent: -100 * (sections.length - 1),
    ease: "none",
    scrollTrigger: {
        trigger: ".gsap-container",
        pin: true,
        scrub: 1,
        snap: 1 / (sections.length - 1),
        end: "+=4000",
    },
});
