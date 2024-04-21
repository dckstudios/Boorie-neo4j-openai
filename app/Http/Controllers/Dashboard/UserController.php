<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use OpenAI\Laravel\Facades\OpenAI;
class UserController extends Controller
{   
    public function connection(){
        require 'C:\Users\aloui\Desktop\Boorie-neo4j-openai\vendor\autoload.php';
        $url='neo4j://172.176.235.251:7687?database=neo4j';
        $auth = Authenticate::basic('neo4j','oPX^xVySa7u04AbR');
        $driver = ClientBuilder::create()->withDriver('neo4j', $url,$auth) ->build();
        return $driver;
    }

    public function sendMessages(Request $request)
    {  
        $client=$this->connection();
        $name=$request->input('MSG');
        $nameuser=$request->input('nameuser');
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $name],
            ],
        ]);
        
        $response=$result->choices[0]->message->content;
        $visibilityMessages='';
        $visibilityhistory='display:none';
        $visibilityUsername='display:none';
        date_default_timezone_set('Europe/Madrid');
        $currtime=date('h:i A', time());
        $humanMsgList=array();
        $aiMsgList=array();
        $client->run("CREATE (h:Message{type: 'human',content:'".$name."'})-[:NEXT]->(a:Message{type:'ai',content: '".$response."'}) ");
        return view('welcome', compact('humanMsgList','aiMsgList','visibilityhistory','name','response','visibilityMessages','nameuser','visibilityUsername','currtime'));
    }
    public function historyMessages(Request $request){
        $client=$this->connection();
        $allMessages=$client->run("MATCH (n:Message) RETURN n ");
        $nameuser=$request->input('nameuser');
        $visibilityUsername='display:none';
        $visibilityMessages='display:none';
        $visibilityhistory='';
        $name='';
        $response='';
        date_default_timezone_set('Europe/Madrid');
        $currtime=date('h:i A', time());
        $humanMsgList = array();
        $aiMsgList = array();
        foreach ($allMessages as $allMessage) {
            if($allMessage["n"]["properties"]["type"]=="human"){
            array_push($humanMsgList, $allMessage["n"]["properties"]["content"]);}
            if($allMessage["n"]["properties"]["type"]=="ai"){
            array_push($aiMsgList, $allMessage["n"]["properties"]["content"]);}

        }
        $humanMsgList=array_slice(array_unique($humanMsgList),count(array_unique($humanMsgList))-4);
        $aiMsgList=array_slice(array_unique($aiMsgList),count(array_unique($aiMsgList))-4);
        return view('welcome', compact('visibilityhistory','name','response','visibilityMessages','nameuser','visibilityUsername','currtime','humanMsgList','aiMsgList'));  
    }
    public function signinUsuario(){
        return view('signin');
    }
    public function signupUsuario(){
        return view('signup');
    }
    public function registerUsuario(Request $request){
        Usuario::create([
            'username' =>  $request->input('nombreUsuario'),
            'usermail' => $request->input('mailUsuario'),
            'password' => $request->input('passwordUsuario')
        ]);
        return view('signin');
    }
    public function loginUsuario(Request $request){
        $userlist = Usuario::select('username', 'usermail', 'password')
                           ->where('usermail', '=',$request->input('mailUsuario'))
                           ->get();
         if(isset($userlist[0]["usermail"])){
            $name='';
            $response='';
            date_default_timezone_set('Europe/Madrid');
            $currtime=date('h:i A', time());
            $nameuser=$userlist[0]["username"];
            $visibilityMessages='display:none';
            $visibilityUsername='display:none';
            $visibilityhistory='display:none';
            $humanMsgList=array();
            $aiMsgList=array();
            return view('welcome', compact('humanMsgList','aiMsgList','visibilityhistory','name','response','visibilityMessages','nameuser','visibilityUsername','currtime'));
         }
         else {
            return view('signin');
         }
        
    }

}
