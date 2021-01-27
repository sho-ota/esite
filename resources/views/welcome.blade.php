<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>eサイト</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    <body>
{{-------------------------------------- ナビゲーションバー ------------------------------------------------}}
        <header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                {{-- トップページへのリンク --}}
                <a class="navbar-brand" href="/">eサイト</a>
            </nav>
        </header>
{{-------------------------------------- ／ナビゲーションバー ----------------------------------------------}}
{{-------------------------------------- アカウント種別リンク ----------------------------------------------}}
        <div id="app">
            <main class="py-4">
                <div class="content">
                    <div class="container">
                        <div class="text-center">
                            <h1>eサイト</h1>
                            <p>ログインページを選択</p>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="links">
                                        <div>{!! link_to('/user/login', 'メンバーの方はこちら', ['class' => 'btn btn-outline-info btn-block mb-2']) !!}</div>
                                        <div>{!! link_to('/staff/login', 'スタッフの方はこちら', ['class' => 'btn btn-outline-info btn-block mb-2']) !!}</div>
                                        {{-- dd(\App\Models\Staff::first()) --}}
                                        @if (\App\Models\Staff::first() == null)
                                            <div>{!! link_to('/staff/register', 'スタッフ登録', ['class' => 'btn btn-outline-info btn-block mb-2']) !!}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
{{-------------------------------------- ／アカウント種別リンク ----------------------------------------------}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>