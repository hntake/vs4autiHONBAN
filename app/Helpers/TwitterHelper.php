<?php

namespace App\Helpers;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterHelper
{
    protected $twitter;

    public function __construct()
    {
        $this->twitter = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_TOKEN_SECRET')
        );
    }

    public function tweet($text)
    {
        $result = $this->twitter->post('statuses/update', ['status' => $text]);
        return $result;
    }
}
