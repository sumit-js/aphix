# Aphix-YouTube

Clone this Git Repo
```
git clone https://github.com//sumit-js/aphix.git
```
Install composer packages
```
cd laravel-youtube
composer install
```

Setup .env file
```
Make a copy of .env.example and rename to .env
$ copy .env.example .env
$ php artisan key:generate
```
Setup youtube api key
```
Put api key in .env file
API_KEY="Create API Key from YouTube data API V3"
SEARCH_ENDPOINT="https://www.googleapis.com/youtube/v3/search"
```
# An Overview

Code for YouTubeController.php to get the videos using Youtube API and store in JSON file.

```
// We will get search result here

    protected function _videoLists($keywords)
    {
        $part = 'snippet';
        $country = 'IE';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 22;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video'; // You can select any one or all, we are getting only videos

        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
        $response = Http::get($url);
        $results = json_decode($response);

        // We will create a json file to see our response
        File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }
```
Code for YouTubeController.php to get single videos using Youtube API and store in JSON file.

```
protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        // Will create a json file to see our single video details
        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }
```
