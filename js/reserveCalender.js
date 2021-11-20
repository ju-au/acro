export default function () {
    // reserve__calenderのタブメニュー

    const tabs = document.querySelectorAll('.reserve__tab');
    if (!tabs) return;
    const firstBody = document.querySelector('.reserve__body');
    
    // 一番最初のtab、bodyに.activeを付与する
    tabs[0].classList.add('active');
    firstBody.classList.add('active');
    
    // タブをクリックしたら一旦全ての.activeを取り、クリックされたtabとそれに対応するbodyに再度付与する
    tabs.forEach(tab => {
        let tabId = tab.dataset.uid;
        let body = document.getElementById('reserve__body--' + tabId);
        tab.addEventListener('click', () => {
            document.querySelectorAll('.active').forEach(element => element.classList.remove('active'));
            tab.classList.add('active');
            body.classList.add('active');
        });
    });
};