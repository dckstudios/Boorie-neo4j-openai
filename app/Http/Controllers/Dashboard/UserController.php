<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{   
    public function connection(){
        require 'C:\Users\aloui\Desktop\Boorie-neo4j-openai\vendor\autoload.php';
        $url='neo4j://172.176.235.251:7687?database=neo4j';
        $auth = Authenticate::basic('neo4j','oPX^xVySa7u04AbR');
        $driver = ClientBuilder::create()->withDriver('neo4j', $url,$auth) ->build();
        return $driver;
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
           $nameuser=$userlist[0]["username"];
           $mailuser=$userlist[0]["usermail"];
           $userinfo = array('nameuser' => $nameuser, 'mailuser' => $mailuser);
           json_encode($userinfo);
            return Redirect::to('/dashboard')->with(['userinfo' => $userinfo]);
         }
         else {
            return view('signin');
         }
        
    }
    public function dashboardRender(){
        return view('dashboard');
    }

    public function chatbotRender(){
        $visibilityMsg='display:none';
        $visibilityhistoria='display:none';
        $name='';
        $response='';
        $humanMsgList=array();
        $aiMsgList=array();
        $userlist = Usuario::first();
        if($userlist!=''){
            $userinfo=$userlist;
        }
        else{
            $userinfo = array("username"=> "","usermail"=> "");
           json_encode($userinfo);
        }
        return view('ai-chat-bot',compact('name','response','visibilityMsg','visibilityhistoria','humanMsgList','aiMsgList','userinfo'));
        
    }
    public function sendMesages(Request $request)
    {  
        $client=$this->connection();
        $name=$request->input('MSG');
        $userlist = Usuario::first();
        if($userlist!=''){
            $userinfo=$userlist;
        }
        else{
            $userinfo = array("username"=> "","usermail"=> "");
           json_encode($userinfo);
        }
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $name],
            ],
        ]);
        
        $response=$result->choices[0]->message->content;
        $visibilityMsg='';
        $visibilityhistoria='display:none';
        $humanMsgList=array();
        $aiMsgList=array();
        $client->run("CREATE (h:Message{type: 'human',content:'".$name."'})-[:NEXT]->(a:Message{type:'ai',content: '".$response."'}) ");
        return view('ai-chat-bot', compact('name','response','visibilityMsg','visibilityhistoria','humanMsgList','aiMsgList','userinfo'));
    }
    public function historyMesages(Request $request){
        $client=$this->connection();
        $userlist = Usuario::first();
        if($userlist!=''){
            $userinfo=$userlist;
        }
        else{
            $userinfo = array("username"=> "","usermail"=> "");
           json_encode($userinfo);
        }
        $allMessages=$client->run("MATCH (n:Message) RETURN n ");
        $visibilityMsg='display:none';
        $visibilityhistoria='';
        $name='';
        $response='';
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
        return view('ai-chat-bot', compact('visibilityhistoria','name','response','visibilityMsg','humanMsgList','aiMsgList','userinfo'));  
    }
    

}