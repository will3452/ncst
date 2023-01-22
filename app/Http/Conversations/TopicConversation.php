<?php
namespace App\Http\Conversations;

use App\ChatConversation;
use App\Topic;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Exception;

class TopicConversation extends Conversation {
    static $SEPARATOR = '+-+-+-';

    public $topics;

    public $chatConversation = [];

    public function askAgain($message = 'Choose a new topic?') {
        $this->logConvo($message, 'bot');
        $question = Question::create($message)
            ->addButtons([
                Button::create('yes')->value('yes'),
                Button::create('No, thank you')->value('no'),
            ]);

        $this->ask($question, function ($answer) {

            $value = $answer->getValue();

            $this->logConvo($value);

            if ($value == 'yes') {
                $this->selectTopic($this->topics);
            } else {
                $this->say('Ok, I hope I helped you.');

                if (auth()->check()) {
                    $conversationGenerated = implode(TopicConversation::$SEPARATOR, $this->chatConversation);
                    ChatConversation::create([
                        'user_id' => auth()->id(),
                        'body' => $conversationGenerated,
                    ]);
                }
            }
        });
    }

    public function logConvo($message, $from = null) {
        if (! $from) {
            $from =  auth()->check() ? auth()->user()->name : 'Guest';
        }
        $this->chatConversation[] = "$from: $message";
    }

    public function selectTopic($topics, $message = 'What topic would you like to know?') {
        $this->logConvo($message, 'bot');
        $buttons = [];
            foreach ($topics as $topic) {
                $buttons[] = (Button::create($topic->name))->value($topic->name.TopicConversation::$SEPARATOR.$topic->description);
            }


            $question = Question::create($message)
                ->addButtons($buttons);


            $this->ask($question, function ($answer) {


                $answerArray = explode(TopicConversation::$SEPARATOR, $answer->getValue());



                if (count($answerArray) < 2) {
                    $this->say('What?');
                    return false;
                }

                $this->say(end($answerArray));

                $this->logConvo($answerArray[0]);

                $topic = Topic::where('name', $answerArray[0])->first();

                if ($topic->subTopics()->count()) {

                    $this->selectTopic($topic->subTopics, 'What sub-topics would you like to know?');
                } else {
                    $this->askAgain();
                }
            });
    }

    public function run ($topic = null) {

        $this->topics = Topic::where('topic_id', null)->get();
        $this->selectTopic($this->topics);
    }

    // public function askImage() {
    //     $this->askForImages('can you give image of yours?', function ($images) {
    //         dd($images);
    //     });
    // }
}
