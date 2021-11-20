<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>


        <section class="reserve__phone">
            <div class="inner reserve__inner">
                <h2>お電話でのご予約・お問い合わせはこちら</h2>
                <p>03-6808-6614</p>
            </div>
        </section>


        <section class="reserve__workingDays">
            <div class="inner reserve__inner">
                <h2>スタイリスト出勤日</h2>
                <p>メールでのご予約・お問い合わせはこちら</p>
                <h3>スタイリスト出勤日</h3>
                <div class="reserve__calender">
                    <div class="reserve__tabArea">
                        <?php
                        $users = get_users();
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <span class="reserve__tab" id="reserve__tab--<?php echo $uid; ?>" data-uid="<?php echo $uid; ?>"><?php echo get_user_meta($uid, 'nickname', true); ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.reserve__tabArea -->
                    <div class="reserve__bodyArea">
                        <?php
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <div class="reserve__body" id="reserve__body--<?php echo $uid; ?>"><?php echo do_shortcode('[attmgr_weekly id="' . $uid . '"]'); ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.reserve__bodyArea -->
                </div>
                <!-- /.reserve__calender -->
            </div>
            <!-- /.reserve__inner -->
        </section>

        <?php echo do_shortcode('[contact-form-7 id="283" title="ご予約・お問い合わせフォーム"]'); ?>
<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>

<section class="form">
    <div class="inner reserve__inner form__inner">
        <h2 class="form__title">ご予約・お問い合わせフォーム</h2>
        <div class="form__container">

            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">氏名</p>
                    <p class="form__note">全角<span class="form__requiered">必須</span></p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">姓[text* family-name]</div>
                    <div class="form__input">名[text* given-name]</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">フリガナ</p>
                    <p class="form__note">全角カナ<span class="form__requiered">必須</span></p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">姓[text* family-name]</div>
                    <div class="form__input">名[text* given-name]</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">メールアドレス</p>
                    <p class="form__note"><span class="form__requiered">必須</span></p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[email* email]</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">ご希望メニュー</p>
                    <p class="form__note">※複数選択可</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">
                        [checkbox menu use_label_element "カット" "カラーリング" "パーマ" "デジタルパーマ" "縮毛矯正" "トリートメント" "ブリーチなど特別なカラー"]
                    </div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">予約日のご希望</p>
                    <p class="form__note">※複数選択可</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">
                        [checkbox menu use_label_element "いつでも" "土日祝" "午前9:30~12時" "午後12時~15時" "午後15時~18時"]
                    </div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">第１希望日時</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[number primary-year min:2021 max:2100]年</div>
                    <div class="form__input">[number primary-month min:1 max:12]月</div>
                    <div class="form__input">[number primary-day min:1 max:31]日</div>
                    <div class="form__input">[select primary-hour include_blank "9" "10" "11" "12" "13" "14" "15" "16" "17" "18" "19"]時</div>
                    <div class="form__input">[select primary-minute include_blank "0" "10" "20" "30" "40" "50"]分</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">第２希望日時</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[number secondary-year min:2021 max:2100]年</div>
                    <div class="form__input">[number secondary-month min:1 max:12]月</div>
                    <div class="form__input">[number secondary-day min:1 max:31]日</div>
                    <div class="form__input">[select secondary-hour include_blank "9" "10" "11" "12" "13" "14" "15" "16" "17" "18" "19"]時</div>
                    <div class="form__input">[select secondary-minute include_blank "0" "10" "20" "30" "40" "50"]分</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">第３希望日時</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[number tertiary-year min:2021 max:2100]年</div>
                    <div class="form__input">[number tertiary-month min:1 max:12]月</div>
                    <div class="form__input">[number tertiary-day min:1 max:31]日</div>
                    <div class="form__input">[select tertiary-hour include_blank "9" "10" "11" "12" "13" "14" "15" "16" "17" "18" "19"]時</div>
                    <div class="form__input">[select tertiary-minute include_blank "0" "10" "20" "30" "40" "50"]分</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">担当者のご希望</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[select stylist id:form__stylist include_blank]</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">リクエスト・ご相談内容</p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">[text request id:form__request]</div>
                </div>
            </div>
            <!-- /.form__item -->
            <div class="form__item">
                <div class="form__titleArea">
                    <p class="form__itemTitle">何で当店を知りましたか？<br><span>アンケートにご協力ください。</span></p>
                </div>
                <div class="form__inputArea">
                    <div class="form__input">
                        [checkbox source use_label_element "ホットペッパー等フリーペーパー" "Instagram" "google マップ等地図アプリ" "当店ホームページ" "知人の紹介" "以前ご利用"]
                    </div>
                </div>
            </div>
            <!-- /.form__item -->

        </div>
        <!-- /.form__container -->
        <p class="form__notice">
            【注意】<br>
            ・通常、数回のメールのやりとりの後にご予約は確定しますので、メールの返信が来ない場合・お急ぎの場合は、お手数ですがお電話でのご予約をお待ちしております。<br>
            ・翌日希望のWeb予約は、前日の１６時までにお願いします。<br>
            ・定休日のご予約は翌営業日の返信となります。<br>
            ・定休日に定休日翌日のWeb予約はご遠慮ください。
        </p>
        <p class="form__closure" id="form__closure"></p>
        [submit]
    </div>
    <!-- /.form__inner -->
    <div id="form__closure--hidden" style="display: hidden;"><?php echo '定休：' . get_post_meta(39, '定休日', true); ?></div>
</section>