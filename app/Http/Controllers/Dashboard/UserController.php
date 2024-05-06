<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use Illuminate\Support\Facades\Redirect;
use Kambo\Langchain\LLMs\OpenAIChat;
use Kambo\Langchain\Prompts\PromptTemplate;
use Kambo\Langchain\Memory\ChatMessageHistory;
use Kambo\Langchain\Chains\LLMChain;


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
            'password' => $request->input('passwordUsuario'),
            'userimg'  => ''
        ]);
        return view('signin');
    }
    public function loginUsuario(Request $request){
        $userlist = Usuario::select('username', 'usermail', 'password','userimg')
                           ->where('usermail', '=',$request->input('mailUsuario'))
                           ->get();
         if(isset($userlist[0]["usermail"])){
           $nameuser=$userlist[0]["username"];
           $mailuser=$userlist[0]["usermail"];
           $imguser=$userlist[0]["userimg"];
           $userinfo = array('nameuser' => $nameuser, 'mailuser' => $mailuser,'imguser' => $imguser);
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

    public function chatbotRender(Request $request){
        $visibilityMsg='display:none';
        $visibilityhistoria='display:none';
        $name='';
        $response='';
        $humanMsgList=array();
        $aiMsgList=array();
        if(isset(explode("=", urldecode($_SERVER["REQUEST_URI"]))[1])){
        $mail=explode("=", urldecode($_SERVER["REQUEST_URI"]))[1];
        $userlist = Usuario::where('usermail',$mail)->first();
        if($userlist!=''){
            $userinfo=$userlist;
        }
        else{
            $userinfo = array("username"=> "","usermail"=> "");
           json_encode($userinfo);
        }
        }
        else{$userinfo = array("username"=> "","usermail"=> "");
            json_encode($userinfo);}
        
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
        $llm = new OpenAIChat([ 'openai_api_key'=>getenv("OPENAI_API_KEY"),'model' => 'gpt-3.5-turbo','model' => 'gpt-3.5-turbo','temperature' => 0.9]);
        $msg=$name;
        $prompt = new PromptTemplate(
        "Question:".$msg."\nAnswer: ",
        );
        $chain = new LLMChain($llm, $prompt, ['verbose' => False]);
        $response=$chain->predict(['question' => $msg]);
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
        $humanMsgHistory=new ChatMessageHistory();
        $aiMsgHistory=new ChatMessageHistory();
        $allMessages=$client->run("MATCH (n:Message) RETURN n ");
        foreach ($allMessages as $allMessage) {
            if($allMessage["n"]["properties"]["type"]=="human"){
                $humanMsgHistory->addUserMessage($allMessage["n"]["properties"]["content"]);}
            if($allMessage["n"]["properties"]["type"]=="ai"){
                $aiMsgHistory->addAiMessage($allMessage["n"]["properties"]["content"]);}
        }
        $humanMsgHistory=$humanMsgHistory->toArray();
        $humanMsgList=array_slice($humanMsgHistory,count($humanMsgHistory)-4);
        $aiMsgHistory=$aiMsgHistory->toArray();
        $aiMsgList=array_slice($aiMsgHistory,count($aiMsgHistory)-4);
        return view('ai-chat-bot', compact('visibilityhistoria','name','response','visibilityMsg','humanMsgList','aiMsgList','userinfo'));  
    }

    public function settingsRender(){
        $userlist = Usuario::first();
        if($userlist!=''){
            $userinfo=$userlist;
        }
        else{
            $userinfo = array("username"=> "","usermail"=> "");
           json_encode($userinfo);
        }
        $test=explode("=", urldecode($_SERVER["REQUEST_URI"]))[1];
        return view('user-setting',compact('userinfo','test'));
    }

    public function updateUserInfo(Request $request){
        
        $Listusuario = Usuario::where('usermail',$request->input('user_email'))->first();
        $Listusuario->update([
            'username' =>  $request->input('nameuser'),
            'usermail' => $request->input('emailuser'),
            'password' => $request->input('pwduser'),
            'userimg'  =>$request->input('image')
        ]);
    
        return redirect('/settings?test=true&userimg='.$request->input('image'));
    }
    

}
