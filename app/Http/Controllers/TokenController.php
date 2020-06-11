<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;
use Twilio\Rest\Client;
class TokenController extends Controller
{
    public function generate(Request $request)
    {
        $user = $request->input("identity");
        $token = new AccessToken('AC00c454dc839c77f91ab5b7c77ab8b7f4','SK89a378b3240ea8805b111d22ef1124d2'
        ,'mMH4gKIXVNvsMjZquy8W1HLkIAA7k23H',3600,"asttt");

        $chatGrant = new ChatGrant();
        $chatGrant->setServiceSid('ISc4e202cd257a4b7da27ee307474c4fd7');
        $token->addGrant($chatGrant);

        $response = array(
            'identity' => "asttt",
            'token' => $token->toJWT(),
        );
        return response()->json($response);
    }

    public function createUser(Request $request){
        $sid    = "AC00c454dc839c77f91ab5b7c77ab8b7f4";
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImp0aSI6IjJhZmNhNWM4LTliNzktNGE0ZC1iYjkyLTczMjY3ZTU4OGQ5YiIsImlhdCI6MTU5MTkxMzU4NiwiZXhwIjoxNTkxOTE3MTg2fQ.G8DsXg3rNWhWi4DrjPWrylvLRN3rTIepxfCBSAZrHhU";
        $twilio = new Client($sid, $token);
        $user = $twilio->chat->v2->services("ISc4e202cd257a4b7da27ee307474c4fd7")
                         ->users
                         ->create("iiidentity");
        return $user;
    }

    public function createChannel(Request $request)
    {
        $sid    = "AC00c454dc839c77f91ab5b7c77ab8b7f4";
        $token  = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiJTSzg5YTM3OGIzMjQwZWE4ODA1YjExMWQyMmVmMTEyNGQyLTE1OTE5MDgwMTEiLCJpc3MiOiJTSzg5YTM3OGIzMjQwZWE4ODA1YjExMWQyMmVmMTEyNGQyIiwic3ViIjoiQUMwMGM0NTRkYzgzOWM3N2Y5MWFiNWI3Yzc3YWI4YjdmNCIsImV4cCI6MTU5MTkxMTYxMSwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiMjUiLCJjaGF0Ijp7InNlcnZpY2Vfc2lkIjoiSVNjNGUyMDJjZDI1N2E0YjdkYTI3ZWUzMDc0NzRjNGZkNyJ9fX0.XLASmI1i6mhM1XKb4ieAoUISzgtkxb4pVwlpuaw24SE";
        $twilio = new Client($sid, $token);
        return $twilio;
        // Fetch channel or create a new one if it doesn't exist

                $channel = $twilio->chat->v2->services("ISc4e202cd257a4b7da27ee307474c4fd7")
                        ->channels
                        ->create([
                                'uniqueName' => 'kjjdghkds',
                                'type' => 'private',
                        ]);

        // // Add second user to the channel
        // try {
        //         $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
        //                 ->channels($ids)
        //                 ->members($otherUser->email)
        //                 ->fetch();

        // } catch (\Twilio\Exceptions\RestException $e) {
        //         $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
        //                 ->channels($ids)
        //                 ->members
        //                 ->create($otherUser->email);
        // }

        return $channel;
    }
}
