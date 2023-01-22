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
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <nav>
            <ul>
                <li><strong>NSCT-CHATBOT</strong></li>
            </ul>
            <ul>
                <li><a href="/home">MENU</a></li>
                <li><a href="/about">ABOUT</a></li>
                <li><a href="/out">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>Conversations</h1>
        @foreach (\App\ChatConversation::whereUserId(auth()->id())->latest()->limit(3)->get() as $item)
            <article>
                <header>
                    Date: {{$item->created_at->format('M d, y')}}
                </header>
                @foreach (explode("+-+-+-", $item->body) as $itemx)
                    <div>
                        <small style="font-size:12px;">
                            {{$itemx}}
                        </small>
                    </div>
                @endforeach
            </article>
        @endforeach
    </div>
<script>
    var botmanWidget = {
        title: 'NSCT',
        introMessage: 'Hi there, you may have questions about NCST.',
        aboutText: 'NCST CHATBOT',
        aboutLink: '#',
        userId: '{{auth()->user()->name}}'
    }
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</body>
</html>
