<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('searching.layout.title')</title>
    

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
       @include('searching.search_layouts.header')
    </header>

    <main class="py-4">
        @yield('searching.content')
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
    /* オリジナル */
    .nav_wrap{
    margin-bottom: 20px;
    }
    .nav_list{
    display: flex;
    margin-bottom: 20px;
    /* justify-content: space-between; */
    }
    .nav_item{
    padding: 10px 20px;
    margin-left: 20px;
    border: #ced4da 1px solid;
    border-radius: 0.375rem;
    text-align: center;
    text-decoration: none;
    }
    .nav_item>a{
    text-align: center;
    text-decoration: none;
    }

    .input_wrap{
    display: flex;
    padding-left: 0;
    margin-top: 20px;
    }
    .label{
    width: 80px;
    }
    .input_box{
    max-width: 400px;
    }
    .form-check .form-check-input{
    margin-left: 0;
    }
    .department_btn{
    margin: 40px 0;
    }

    .picup{
    background: #0d6efd;
    }
    .picup>a{
    color: #fff;
    }
    .err_m{
    margin-left: 90px;
    }
    .wrap{
       max-width: 400px;
    }
    .form-label{
        margin: 0;
        line-height: 2rem;
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