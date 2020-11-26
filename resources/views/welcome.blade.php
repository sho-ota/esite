<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>eサイト</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    <body>
        <div id="app">
            
{{-- ナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        eサイト
                    </a>
                </div>
            </nav>
{{-- ／ナビゲーションバー --}}

            <main class="py-4">
                <div class="content">
                    
                    <div class="container">
                        <div class="jumbotron text-center">
                            <h1>eサイト</h1>
                            <div class="links">
                                <a href="/user/login">
                                    メンバーの方はこちら
                                </a>
                                </br>
                                <a href="/staff/login">
                                    スタッフの方はこちら
                                </a>
{{--確認用--}}
</br>
</br>
<a href="/user/register">
利用者登録(※確認用)
</a>
</br>
<a href="/staff/register">
スタッフ登録(※確認用)
</a>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>