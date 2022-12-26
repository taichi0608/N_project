<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('department.department_layouts.layout.title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
       @include('department.department_layouts.header')
    </header>
    <br>
    <main class="py-4">
   
        @yield('department.content')
    </main>
    <footer class="footer bg-dark  fixed-bottom">
        
    </footer>
</body>
</html>

<style>
    /* オリジナル */
    .form-wrap{
        position: relative;
    }
    .delete{
        position: absolute;
        bottom: 0;
        left: 250px;
    }
</style>

<script>
  function checkSubmit(){
      if(window.confirm('変更してよろしいですか？')){
          return true;
      } else {
          return false;
      }
  }

  function checkDestroy(){
      if(window.confirm('削除してよろしいですか？')){
          return true;
      } else {
          return false;
      }
  }

</script>