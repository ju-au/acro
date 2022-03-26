export default function () {
    // schedule__calenderのタブメニュー

    const tabs = document.querySelectorAll('.schedule__tab');
    if (tabs.length === 0) return;
    const firstBody = document.querySelector('.schedule__body');
    
    // 一番最初のtab、bodyに.activeを付与する
    tabs[0].classList.add('active');
    firstBody.classList.add('active');
    
    // タブをクリックしたら一旦全ての.activeを取り、クリックされたtabとそれに対応するbodyに再度付与する
    tabs.forEach(tab => {
        let tabId = tab.dataset.uid;
        let body = document.getElementById('schedule__body--' + tabId);
        tab.addEventListener('click', () => {
            document.querySelectorAll('.active').forEach(element => element.classList.remove('active'));
            tab.classList.add('active');
            body.classList.add('active');
        });
    });
};