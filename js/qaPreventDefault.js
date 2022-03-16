export default function () {
    const qaTitle = document.querySelectorAll(".ewd-ufaq-faq-title .ewd-ufaq-post-margin");
    if (!qaTitle) return;
    for (let title of qaTitle) {
        title.addEventListener('click', (e) => {
            e.preventDefault();
        })
    }
}