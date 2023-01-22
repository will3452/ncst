<!DOCTYPE html >
<html lang="{{ app()->getLocale() }}"  data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NCST</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <style>
        :root {
        --primary: #1e88e5;
        }
    </style>
    <link rel="stylesheet" href="/custom.css">
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <nav>
            <ul>
                <li><strong>NCST-CHATBOT</strong></li>
            </ul>
            <ul>
                <li><a href="#">ABOUT</a></li>
                @guest
                <li><a href="/register">REGISTER</a></li>
                @endguest
            </ul>
        </nav>
    </div>

    <!-- Main -->
    <main class="container">
        <article class="grid">
          <div>
            <hgroup>
              <h1>NCST CHATBOT</h1>
              <h4 id="typed"></h4>
            </hgroup>
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <p style="color:red;">{{$item}}</p>
                @endforeach
            @endif
            <form method="POST" action="/login">
                @csrf
              <input type="email" name="email" placeholder="Email" aria-label="Email" autocomplete="email" required>
              <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
              <button type="submit">Login</button>
            </form>
          </div>
          <div style="background:url('NCSTFront.jpg');background-size:cover;"></div>
        </article>
      </main><!-- ./ Main -->
<script>
    var botmanWidget = {
        title: 'NCST',
        introMessage: 'Hi there, you may have questions about NCST.',
        aboutText: 'NCST CHATBOT',
    }
</script>
<script>
    var typed = new Typed('#typed', {
        strings:['Hi there, how can we help you today?'],
        backSpeed: 40,
        typeSpeed: 40,
    })
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script>
    window.onload = () => {
        setTimeout(() => {
            botmanChatWidget.open()
        }, 4000);
    }
</script>
</body>
</html>
