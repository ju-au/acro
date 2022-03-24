/** ファーストビューのswiper.jsのパラメータ設定 */
import fvSlider from './js/fvSlider.js';
fvSlider();

/** トップに戻るボタンの挙動 */
import toTop from './js/toTop.js';
toTop();

/** galleryの写真のInstagramへのリンクを無効化 */
import gallery from './js/gallery.js';
gallery();

/** お問い合わせフォームの表示、選択肢等の微調整 */
import form from './js/form.js';
form();

/** 技術ページのQ&Aのタイトルを「よくある質問」に変更する */
import qaTitle from './js/qaTitle.js';
qaTitle();


/**
 * margin-bottomを計算する
 * 
 * 画面幅に応じてheightが変わる要素1の下に
 * position:absolute;で配置される要素2がある場合に
 * 要素2とその下の要素との余白を一定にする
 * PC画面とSP画面で切り替えができる
 * 
 * @param str $content1 要素1のセレクタ
 * @param str $content2 要素2のセレクタ
 * @param array {
 *  gapBtwNextContentPc: int,   要素2の下に取りたい余白（px）（数字のみ）（PC画面）
 *  gapBtwNextContentSp: int,   要素2の下に取りたい余白（px）（数字のみ）（SP画面）
 *  padding: str,  marginではなくpaddingにしたい場合に何か文字を入力（省略可）
 * } $config
 */
import calcMB from './js/calcMB.js';
// スタイリスト個別ページ
calcMB(
    ".stylist__img",
    ".stylist__profileBody",
    {
        'gapBtwNextContentPc': 109,
        'gapBtwNextContentSp': 60,
    }
);
// 店舗紹介ページ
calcMB(
    ".interior",
    ".interior p",
    {
        'gapBtwNextContentPc': 100,
        'gapBtwNextContentSp': 60,
    }
);
// 店舗紹介ページ
calcMB(
    ".exterior",
    ".exterior p",
    {
        'gapBtwNextContentPc': 100,
        'gapBtwNextContentSp': 60,
    }
);
// 店舗紹介ページ
calcMB(
    ".shopFront1",
    ".shopFront1 .wp-block-image:nth-of-type(2)",
    {
        'gapBtwNextContentPc': 100,
        'gapBtwNextContentSp': 138,
    }
);
// 店舗紹介ページ
calcMB(
    ".shopFront2",
    ".shopFront2 .wp-block-image:nth-of-type(2)",
    {
        'gapBtwNextContentPc': 108,
        'gapBtwNextContentSp': 60,
    }
);
// 店舗紹介ページ
calcMB(
    ".shampoo",
    ".shampoo p",
    {
        'gapBtwNextContentPc': 147,
        'gapBtwNextContentSp': 60,
        'padding':"padding",
    }
);


/** 予約ページの「出勤日」で、スタッフの名前をタブの位置に移動させる */
import reserveCalender from './js/reserveCalender.js';
reserveCalender();


