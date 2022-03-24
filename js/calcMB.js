export default function (con1, con2, config) {
    const content1 = document.querySelector(con1);
    if (!content1) return;
    const content2 = document.querySelector(con2);
    let content1Height = 0;
    let content2Height = 0;
    let content2Top = 0;
    let gapBtwNextContent = 0;
    let mb = 0;

    function calculateMB() {
        content1Height = content1.clientHeight;
        content2Height = content2.clientHeight;
        content2Top = Number(getComputedStyle(content2).top.replace('px', ''));
        if (window.matchMedia('(max-width: 598px)').matches) {
            // sp画面
            gapBtwNextContent = config['gapBtwNextContentSp'];
        } else {
            // その他
            gapBtwNextContent = config['gapBtwNextContentPc'];
        };
        mb = content2Height - (content1Height - content2Top) + gapBtwNextContent;
        if (config['padding']) {
            content1.style.paddingBottom = mb + "px";
        } else {
            content1.style.marginBottom = mb + "px";
        }
    };

    // 画面サイズが変更される度に計算を行う
    window.addEventListener('resize', () => {
        calculateMB();
    });

    // 画面ロード時に最初の処理
    calculateMB();
};