<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Collection;
use stdClass;

class MainController extends Controller
{
    //
    public function index(){

        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://edition.cnn.com/europe');

        // Get the latest post in this category and display the titles
         $result = $crawler->filter('.cn__title')->each(function ($node){
            return $posts[] = $node->text();
        });

        $result = $crawler->filter('article')->each(function ($node){
            return $posts[] = $node->text();
        });

        //get articles
        $result2 = $crawler->filter('.cn__title')->each(function ($node){
            return $posts[] = $node->text();
        });

        $images = $crawler->filter('article img')->each(function ($node){
            return $posts[] = $node->attr('src');
        });
  
        $searchword = '.jpg';
        $articlesImages = array_filter($images, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var); });
      
        //reset keys
        $articlesImages = array_values(array_filter($articlesImages));

        //put all articles together;
        $articles = array_merge(array( $result[0]), $result2);
    
        $articlesList = [];
        $articlesObject = new stdClass();

        foreach ($articles as $key => $ar) {
            $article = new $articlesObject;
            $article->title = $ar;
            $article->image = $articlesImages[$key];
            array_push($articlesList,$article);
            # code...
        };

        return view('welcome', ['articles' => $articlesList]);
    }
}
