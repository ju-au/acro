export default function () {
    const img = document.getElementById('stylist__img');
    if (!img) return;
    const body = document.getElementById('stylist__profileBody');
    let imgHeight = 0;
    let bodyHeight = 0;
    let bodyTopPercent = 0;
    let gapBtwNextContent = 0;

    function calculateMB() {
        imgHeight = img.clientHeight;
        bodyHeight = body.clientHeight;
        console.log(window.matchMedia('(max-width: 598px)').matches);
        if (window.matchMedia('(max-width: 598px)').matches) {
            // sp画面
            bodyTopPercent = 85;
            gapBtwNextContent = 65;
        } else {
            // その他
            bodyTopPercent = 47;
            gapBtwNextContent = 109;
        };
        console.log(bodyHeight);
        console.log(imgHeight * ((100 - bodyTopPercent) / 100));
        console.log(gapBtwNextContent);
        const mb = bodyHeight - (imgHeight * ((100 - bodyTopPercent) / 100)) + gapBtwNextContent;
        img.style.marginBottom = mb + "px";

    };

    // 画面サイズが変更される度に計算を行う
    window.addEventListener('resize', () => {
        calculateMB();
    });

    // 画面ロード時に最初の処理
    calculateMB();
};