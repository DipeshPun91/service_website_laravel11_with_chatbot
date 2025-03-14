<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            $message = strtolower($message);

            if (strpos($message, 'hi') !== false || strpos($message, 'hello') !== false) {
                $botman->reply("Hello! How can I assist you today? You can ask about our services, pricing, or anything else!");
            } elseif (strpos($message, 'services') !== false) {
                $botman->reply("We offer a variety of software solutions tailored to meet the needs of different industries, including custom development, automation, and more.");
            } elseif (strpos($message, 'pricing') !== false) {
                $botman->reply("Our pricing depends on the specific software solution you require. Feel free to contact us for a personalized quote.");
            } elseif (strpos($message, 'contact') !== false) {
                $botman->reply("You can reach us through our 'Contact Us' form. Please provide details such as your name, email, phone, company name, job title, and job details.");
            } elseif (strpos($message, 'company') !== false) {
                $botman->reply("We are a leading software solutions provider with years of experience helping companies streamline their processes.");
            } else {
                $botman->reply("I'm sorry, I couldn't understand that. You can ask me about our services, pricing, or how to get in touch.");
            }
        });

        $botman->listen();
    }
}
