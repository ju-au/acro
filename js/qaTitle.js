export default function () {
    // QAのタイトルのリンクを無効化
    const title = document.querySelectorAll("a.ewd-ufaq-post-margin");
    if (!title) return;
    for (let i = 0; i < title.length; i++) {
        title.item(i).addEventListener('click', (e) => {
            e.preventDefault();
        });
    };

    // 技術ページのQAカテゴリータイトルを削除
    const serviceQaTitle = document.querySelector(".single-service .ewd-ufaq-faq-category-title");
    if (!serviceQaTitle) return;
    serviceQaTitle.remove();

}