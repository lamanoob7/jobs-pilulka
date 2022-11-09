<?php

namespace App\Service;

use App\Service\TwitterLoaded\Operators;
use Coderjerk\BirdElephant\BirdElephant;
use Coderjerk\BirdElephant\Tweets;

/*
* Module responsible for getting tweets from twitter based on config
*/
class TwitterLoaded
{
    public $appId;
    public $apiKey;
    public $apiSecretKey;
    public $bearer;
    public $accessToken;
    public $accessSecretToken;
    public $searchedStrings = [];
    
    /*
    * Return recent tweets with limit set in code and searched words in config
    */
    public function getFeeds(int $limit = 10): array
    {
        $tweets = $this->getTweets();

        $escaped = $this->prepareKeywords(Operators::OR);

        $params = [
            'user.fields' => 'id,name,profile_image_url,url',
            'tweet.fields' => 'attachments,author_id,created_at',
            'expansions'   => 'attachments.media_keys',
            'media.fields' => 'public_metrics,type,url,width',
            'query' => $escaped,
            'max_results'  => $limit,
        ];
        
        $return = $tweets->search()->recent($params);

        return $this->prepareResults($return->data);
    }

    // Prepare authentication data from config
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

    // Create base tweet class from BlueElephant
    private function getTweets(): Tweets
    {
        $twitter = new BirdElephant($this->prepareCredentials());

        return $twitter->tweets();
    }

    // Prepare seached string/hashtags from config into query format
    private function prepareKeywords(Operators $operatorOnFilteredKeywords = Operators::OR)
    {
        $operator = $operatorOnFilteredKeywords === Operators::OR ? ' ' . $operatorOnFilteredKeywords->value . ' ' : ' ';

        $joined = join($operator, $this->searchedStrings);
        return $joined;
    }

    // function for possible transfering results into class for easier working in code - better structured object than anonymous array
    private function prepareResults(array $results)
    {
        return $results;
    }
}