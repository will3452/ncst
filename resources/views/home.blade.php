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
                <li><a href="#">MENU</a></li>
                <li><a href="/about">ABOUT</a></li>
                <li><a href="/out">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>DASHBOARD</h1>
        <article>
            <header>MENU</header>
            <a target="_blank" role="button" href='/botman/chat?conf=%7B"chatServer"%3A"%2Fbotman"%2C"frameEndpoint"%3A"%2Fbotman%2Fchat"%2C"timeFormat"%3A"HH%3AMM"%2C"dateTimeFormat"%3A"m%2Fd%2Fyy%20HH%3AMM"%2C"title"%3A"NSCT"%2C"cookieValidInDays"%3A1%2C"introMessage"%3A"Hi%20there%2C%20you%20may%20have%20questions%20about%20NCST."%2C"placeholderText"%3A"Send%20a%20message..."%2C"displayMessageTime"%3Atrue%2C"sendWidgetOpenedEvent"%3Afalse%2C"widgetOpenedEventData"%3A""%2C"mainColor"%3A"%23408591"%2C"headerTextColor"%3A"%23333"%2C"bubbleBackground"%3A"%23408591"%2C"bubbleAvatarUrl"%3A""%2C"desktopHeight"%3A450%2C"desktopWidth"%3A370%2C"mobileHeight"%3A"100%25"%2C"mobileWidth"%3A"300px"%2C"videoHeight"%3A160%2C"aboutLink"%3A"%23"%2C"aboutText"%3A"NCST%20CHATBOT"%2C"chatId"%3A""%2C"userId"%3A""%2C"alwaysUseFloatingButton"%3Afalse%2C"wrapperHeight"%3A450%7D#'>
                CHATBOT
            </a>
            <a role="button" class="secondary" href='/conversation'>
                CONVERSATIONS
            </a>
            <a href="javascript:botmanChatWidget.say('list of topic')" role="button" class="outline">
                TOPICS
            </a>
        </article>
        <article>
            <header>
              CHANGE PASSWORD
            </header>
            <form action="/change-password" method="POST">
                @csrf
                <input type="email" label="Email" name="email" placeholder="Email" value="{{auth()->user()->email}}" disabled>
                <input type="password" label="Password" name="password" placeholder="New Password">
                <button type="submit">SAVE CHANGE</button>
            </form>
        </article>

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
