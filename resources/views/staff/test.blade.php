<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>testページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <script src="/js/app.js"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <style>
    .box {
        width: 200px;
        height: 200px;
        background-color: #fcc;
        padding: 10px;
    }
    </style>
</head>
<body>
{{------------------------------------------------------------------------------------------------}}
    <div id="test"></div>
    <div>
        <button id="fadeOut">fadeOut</button>
    </div>
    <div class="box">box</div>
{{------------------------------------------------------------------------------------------------}}
    <script>
        $("#test").html("jqueryでかきかえました").css("background-color", "#fcc");
    </script>
    <script>
        $("#fadeOut").on("click", function() {
            $(".box").fadeOut();
        })
    </script>
{{------------------------------------------------------------------------------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</body>
</html>
