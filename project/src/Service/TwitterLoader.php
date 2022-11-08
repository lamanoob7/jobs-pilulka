<?php

namespace App\Service;

use App\Service\TwitterLoaded\Operators;
use Coderjerk\BirdElephant\BirdElephant;
use Coderjerk\BirdElephant\Tweets;

class TwitterLoaded
{
    public $appId;
    public $apiKey;
    public $apiSecretKey;
    public $bearer;
    public $accessToken;
    public $accessSecretToken;
    public $searchedStrings = [];
    
    public function getFeeds(array $keywords = [], $limit = 10): array
    {
        $tweets = $this->getTweets();

        $escaped = $this->prepareKeywords($keywords, Operators::OR);

        $params = [
            'query' => $escaped,
            'max_results'  => $limit,
        ];
        
        $return = $tweets->search()->recent($params);

        return $this->prepareResults($return->data);
    }

    private function prepareCredentials(): array
    {
        $credentials = array(
            'bearer_token' => $this->bearer, 
            'consumer_key' => $this->apiKey, 
            'consumer_secret' => $this->apiSecretKey, 
            'auth_token' => $this->accessToken,
            'token_identifier' => $this->appId, 
            'token_secret' => $this->accessSecretToken
        );

        return $credentials;
    }

    private function getTweets(): Tweets
    {
        $twitter = new BirdElephant($this->prepareCredentials());

        return $twitter->tweets();
    }

    private function prepareKeywords(array $keywords, Operators $operatorOnFilteredKeywords = Operators::OR)
    {
        $operator = $operatorOnFilteredKeywords === Operators::OR ? ' ' . $operatorOnFilteredKeywords->value . ' ' : ' ';

        $joined = join($operator, $keywords);
        return $joined;
    }

    private function prepareResults(array $results)
    {
        return $results;
    }
}