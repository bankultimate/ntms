<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use GuzzleHttp\Client;
use Guzzle\Http\Client;
use Guzzle\Common\Event;
use Guzzle\Http\Message\Response;

class TestController extends Controller
{
	function __construct()
	{
		/*
			Check Authen
		*/
	}
	
	/* localhost/ntms/public/commandview -> commandview, CommandController@view */
	public function view()
	{
		/* Reture View complete or return Status complete */
		return view('cmd');
	}

	/*public function cmd(Request $request_in)*/
	public function cmd($json)
	{
		//$json = $request_in->input('json');
		
		//$client = new Client(['base_uri' => 'http://172.16.41.201:8081/cmd']);
		//$res = $client->request('GET', 'http://172.16.41.201:8081/cmd?s=1');
		
		//$res = $client->request('GET', '/cmd', ['headers' => ['json' => 'test']]);
		
		$client = new Client();
		$request = $client->post('http://172.16.41.201:8081/cmdPost',array(),array(
			'json' => $json
		)); 
		$response = $request->send();
		//echo $res->getStatusCode(); // 200
		/*$response->getEventDispatcher()->addListener('curl.callback.read', function (Event $e) {
			console.log($e['request'] . "\n\n");
			console.log($e['response']);
		});*/
		$body = $response->getBody();
		//echo $res->getBody(); // { "type": "User", ....
		$strBody = (string) $body;
		//echo (string) $body;
		
		/* Reture View complete or return Status complete */
		//return $strBody;
		echo $strBody;
	}
	
	public function cmdGet($json)
	{
		/*$client = new Client();
		$request = $client->request('GET', 'http://172.16.41.201:8081/cmd?json={'.$json.'}');
		$response = $request->send();
		$body = $response->getBody();
		$strBody = (string) $body;
		echo $strBody;*/
		
		// Send an asynchronous request.
		/*$client = new \GuzzleHttp\Client();
		$request = new \GuzzleHttp\Psr7\Request('GET', 'http://172.16.41.201:8081/cmd?json='.$json);
		$promise = $client->sendAsync($request)->then(function ($response) {
			echo 'I completed! ' . $response->getBody();
		});
		$promise->wait();*/
		
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'http://172.16.41.201:8081/cmd?json='.$json, ['stream' => true]);
		// Read bytes off of the stream until the end of the stream is reached
		$body = $response->getBody();
		while (!$body->eof()) {
			echo $body->read(16);
		}
	}
	
	public function cmdPost($json)
	{
		$client = new Client();
		$request = $client->post('http://172.16.41.201:8081/cmdPost',array(),array(
			'json' => $json
		)); 
		$response = $request->send();
		$body = $response->getBody();
		$strBody = (string) $body;
		echo $strBody;
	}
}