export default function() {
    const toTopBtn = document.getElementById('fixedLink__toTop');
    toTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
}