<?php
use App\Fallback;
use App\Response;
use App\Http\Controllers\BotManController;
use App\Http\Conversations\TopicConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\Middleware\DialogFlow\V2\DialogFlow;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');


// response

$dialogflow = DialogFlow::create('en');

$botman->middleware->received($dialogflow);

$botman->hears('input.welcome', function ($bot) {
    $extras = $bot->getMessage()->getExtras();
    $bot->reply($extras['apiReply']);
})->middleware($dialogflow);

$botman->hears('input.topic', function ($bot) {
    $bot->startConversation(new TopicConversation());
})->middleware($dialogflow);


$botman->hears('input.about', function ($bot) {
    $extras = $bot->getMessage()->getExtras();
    $bot->reply($extras['apiReply']);
})->middleware($dialogflow);


$botman->hears('input.lms', function ($bot) {
    $extras = $bot->getMessage()->getExtras();
    $bot->reply($extras['apiReply']);
})->middleware($dialogflow);

// $botman->hears('input.unknown', function ($bot) {
//     $extras = $bot->getMessage()->getExtras();
//     $bot->reply($extras['apiReply']);
// })->middleware($dialogflow);

$botman->hears('smalltalk.(.*)', function ($bot) {
    $extras = $bot->getMessage()->getExtras();
    $bot->reply($extras['apiReply']);
})->middleware($dialogflow);


// demo

$botman->hears('hey, {pattern}', function ($bot, $pattern) {
    $message = 'huh?';
    $exists = Response::where('pattern', 'LIKE', "%".$pattern."%")->first();

    if ($exists) {
        $message = $exists->response;
    }

    $bot->reply($message);
});

$botman->hears('school logo', function($bot) {
    $attachment = new Image(url('/logo.png'));

    // Build message object
    $message = OutgoingMessage::create('Here\'s the school logo')
                ->withAttachment($attachment);

    $bot->reply($message);
});

$botman->fallback(function ($bot) {
    $array = ["sorry i don't know what you are asking.", "I'm sorry I can't answer you.", "huh?"];

    $fallbacks = Fallback::get()->pluck('message');

    $bot->reply($fallbacks[rand(0, count($fallbacks) - 1)]);
});
// $botman->hears('Start conversation', BotManController::class.'@startConversation');
