export default function () {
    // formの表示、選択肢等の微調整

    // 「担当者の希望」のプルダウンメニューに、スタイリスト出勤日のスタイリスト名を付与
    (function () {
        const stylist = document.getElementById('form__stylist');
        const stylistNames = document.querySelectorAll('.reserve__tab');
        stylistNames.forEach(stylistName =>{
            const option = document.createElement('option');
            option.setAttribute('value', stylistName.innerText);
            option.innerText = stylistName.innerText;
            stylist.appendChild(option);
        });
    }());


    // フォーム下の定休日の表示（contact form7内では、直接カスタムフィールドの値を取得できないため）
    (function () {
        const closure = document.getElementById('form__closure');
        const closureHidden = document.getElementById('form__closure--hidden');
        closure.innerText = closureHidden.innerText;
        closureHidden.remove();
    }());
};