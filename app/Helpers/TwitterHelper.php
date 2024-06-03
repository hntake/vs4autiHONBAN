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
    //新しい画像がアップロードされたら
    public function tweet($design)
    {
        $text = "新しい作品が投稿されました！ 作品名:{$design->name} アーティスト名:{$design->artist_name} https://itcha50.com/design/download/{$design->id}";
            $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }

    //新しいスレッドが作成されたら
    public function tweet_thread($thread)
    {
        $text = "新しいスレッドが投稿されました！ スレッド名:{$thread->title}  https://itcha50.com/bbs/index/{$thread->id}";
        $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }
}
