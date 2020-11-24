<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="/css/styles.css">
  <!-- ↓ログインScaffold で追加した分・・・と思ってたけど、デフォルトで存在している？ -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
</body>
</html>