<?php

namespace App\Service;

use Noweh\TwitterApi\Client;

class TwitterLoaded
{
    public $appId;
    public $apiKey;
    public $apiSecretKey;
    public $bearer;
    public $accessToken;
    public $accessSecretToken;
    
    public function getFeeds(array $queries = [], $limit = 10): array
    {
        $client = $this->getClient();

        dump($client);

        $return = $client->tweetSearch()
            ->addFilterOnKeywordOrPhrase([
                'Dune',
                'DenisVilleneuve'
            ], \Noweh\TwitterApi\Enum\Operators::and)
            ->showUserDetails()
            ->performRequest()
        ;

        dump($return);

        $feeds = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        return $feeds;
    }

    private function prepareSettings(): array
    {
        $settings = [
            'account_id' => $this->appId,
            'consumer_key' => $this->apiKey,
            'consumer_secret' => $this->apiSecretKey,
            'bearer_token' => $this->bearer,
            'access_token' => $this->accessToken,
            'access_token_secret' => $this->accessSecretToken
        ];

        return $settings;
    }

    private function getClient(): Client
    {
        return new Client($this->prepareSettings());
    }
}