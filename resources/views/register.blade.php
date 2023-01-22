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
    <div class="container">
        <nav>
            <ul>
                <li><strong>NSCT-CHATBOT</strong></li>
            </ul>
            <ul>
                <li><a href="#">ABOUT</a></li>
                @guest
                <li><a href="/">LOGIN</a></li>
                <li><a href="/register">REGISTER</a></li>
                @endguest
            </ul>
        </nav>
    </div>
    <main class="container">
        <article class="grid">
          <div>
            <hgroup>
              <h1>REGISTER</h1>
            </hgroup>
            <form method="POST" action="/register">
                @csrf
              <input type="text" name="name" placeholder="Name" aria-label="Name" autocomplete="name" required>
              <input type="email" name="email" placeholder="Email" aria-label="Email" autocomplete="email" required>
              <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
              <button type="submit" >REGISTER</button>
            </form>
          </div>
          <div style="background:url('NCSTFront.jpg');background-size:cover;"></div>
        </article>
      </main>
      <script>
          var botmanWidget = {
              title: 'NSCT',
              introMessage: 'Hi there, you may have questions about NCST.',
              aboutText: 'NCST CHATBOT',
              aboutLink: '#',
          }
      </script>
      <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
      </body>
      </html>
