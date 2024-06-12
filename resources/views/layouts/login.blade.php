<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a  href="top"><img src="images/atlas.png"></a></h1><!--ヘッダーロゴ-->
            <div id="">
                <div id="">

<!-- 2024/06/06　アコーディオンメニューの実装で苦戦してます。。。 -->
                <!-- アコーディオンメニュー -->
                <div class="accordion">
                    <div class="accordion-container">
                        <div class="accordion-item">
                            <h3 class="accordion-title js-accordion-title">
                                {{ Auth::user()->username }}   さん</h3>
                                <div class="accordion-content">
                                    <ul>
                                        <li><a href="/top">ホーム</a></li>
                                        <li><a href="/profile">プロフィール</a></li>
                                        <li><a href="/logout">ログアウト</a></li>
                                    </ul>
                                </div>
                            </div>
                        <div class="accordion-item">
                            <img src="images/icon1.png">
                        </div>
                    </div>
                </div>


            <div>
             <!--darailsを用いたアコーディオンメニュー-->
             <!--<details>
                    <summary><a href="/top">ホーム</a></summary>
                    <summary><a href="/profile">プロフィール</a></summary>
                    <summary><a href="/logout">ログアウト</a></summary>
                </details>-->
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>

</body>
</html>
