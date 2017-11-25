<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use GuzzleHttp\Client;
//use Guzzle\Http\Client;
//use Guzzle\Common\Event;
//use Guzzle\Http\Message\Response;

class ApiController extends Controller
{
	function __construct()
	{
		/*
			Check Authen
		*/
	}
	
	public function newCmd($user,$command){
		$client = new Client();
		/* Bypass User */
		$url = 'http://172.16.41.201:3000/cmd/new';
			//code here
		$response = $client->request('GET', 'http://172.16.41.201:3000/cmd/new?user='.$user.'&command='.$command);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'user' => $jsonDecode['user'],
			'command' => $jsonDecode['command']]);
	}
	
	public function getAllCmd($user){
		$client = new Client();
		$response = $client->request('GET', 'http://172.16.41.201:3000/cmd/getallcmd?user='.$user);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['user' => $jsonDecode['user'],
			'myID' => $jsonDecode['myID'],
			'myCommand' => $jsonDecode['myCommand'],
			'myHistory' => $jsonDecode['myHistory'],
			'length' => $jsonDecode['length'],
			'max' => $jsonDecode['max']]);
	}
	
	public function clearAllCmd($user){
		$client = new Client();
		$response = $client->request('GET', 'http://172.16.41.201:3000/cmd/clearallcmd?user='.$user);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['user' => $jsonDecode['user'],
			'length' => $jsonDecode['length']]);
	}
	
	public function runCmd($json){
		$client = new Client();
		$jsonDecode = json_decode($json,true);
		$url = 'http://172.16.41.201:3000/cmd/run';
		$body = '';
		if ($jsonDecode['method'] == 'remote') {
			$remoteProfile = DB::table('remote_profile')
				->select('port','method','end_regex','regex_message')
				->where('id', '=', $jsonDecode['refid'])
				->get();
			$jsonRemoteProfile = json_encode($remoteProfile[0]);
			$body = ['json'=>$json,'user'=>$jsonDecode['user'],'remoteProfile'=>$jsonRemoteProfile];
		} else {
			$body = ['json'=>$json,'user'=>$jsonDecode['user']];
		}
		$response = $client->request('POST', $url,['json'=>$body]);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'cmd' => $jsonDecode['cmd'],
			'state' => $jsonDecode['state']]);
	}

	public function getCmd($json){
		$client = new Client();
		$jsonDecode = json_decode($json,true);
		$response = $client->request('GET', 
			'http://172.16.41.201:3000/cmd/get?cmdID='.$jsonDecode['cmdID'].'&clientIndex='.$jsonDecode['clientIndex']
		);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'cmd' => $jsonDecode['cmd'],
			'maxStdOut' => $jsonDecode['maxStdOut'],
			'stdOut' => $jsonDecode['stdOut'],
			'index' => $jsonDecode['index'],
			'end' => $jsonDecode['end']]);
	}
	
	public function setCmd($json){
		$client = new Client();
		$jsonDecode = json_decode($json,true);
		$response = $client->request('GET', 
			'http://172.16.41.201:3000/cmd/set?cmdID='.$jsonDecode['cmdID'].'&message='.$jsonDecode['message'].'&user='.$jsonDecode['user']
		);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'message' => $jsonDecode['message'],
			'state' => $jsonDecode['state']]);
	}
	
	public function breakCmd($json){
		$client = new Client();
		$jsonDecode = json_decode($json,true);
		$response = $client->request('GET', 
			'http://172.16.41.201:3000/cmd/break?cmdID='.$jsonDecode['cmdID'].'&user='.$jsonDecode['user']
		);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'pid' => $jsonDecode['pid'],
			'state' => $jsonDecode['state']]);
	}
	
	public function stateCmd($json){
		$client = new Client();
		$jsonDecode = json_decode($json,true);
		$response = $client->request('GET', 
			'http://172.16.41.201:3000/cmd/cmdstate?cmdID='.$jsonDecode['cmdID'].'&user='.$jsonDecode['user']
		);
		$body = (string) $response->getBody();
		$jsonDecode = json_decode($body,true);
		//{"cmd":"ping 10.1.1.254 ","cmdID":1}
		return response()->json(['cmdID' => $jsonDecode['cmdID'],
			'end' => $jsonDecode['end'],
			'state' => $jsonDecode['state']]);
	}
}