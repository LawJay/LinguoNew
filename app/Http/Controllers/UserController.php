<?php 
namespace App\Http\Controllers;
use App\Message;
use Auth;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{



	public function postSignUp(Request $request)
	{
			$this->validate($request, [
				'email' => 'required|email|unique:users',
				'name' => 'required|max:120',
				'password' => 'required|min:8'

			]);

			$email = $request['email'];
			$name = $request['name'];
			$password = bcrypt($request['password']);

			$user = new User();
			$user->email = $email;
			$user->name = $name;
			$user->password = $password;

			$user->save();

			Auth::login($user);

			return redirect()->route('register');

	}

	public function postSignIn(Request $request)
	{
		$this->validate($request, [
				'email' => 'required',
				'password' => 'required'

			]);
		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
			return redirect()->route('dashboard');
		}	
		return redirect()->back();
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->route('login');
	}

	public function getAccount()
	{
		return view('account', ['user' => Auth::user()]);
	}

	public function postSaveAccount(Request $request)
	{
        $this->validate($request, [
           'name' => 'required|max:120'
        ]);
        $user = Auth::user();
        $user->location = $request['location'];
        $user->bio = $request['bio'];
        $user->age = $request['age'];
        $user->website = $request['website'];
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        
        if ($file) {
            
            Storage::disk('uploads')->put($filename, File::get($file));
        }
        
        return redirect()->route('account');
    }

	public function getUserImage($filename)
	{

		$file = Storage::disk('uploads')->get($filename);
		return Storage::get($filename); 
	}

	public static function getUsername($id){
        $user = User::where('id', $id)->get();
	    return $user->name;

    }

	public function getUser($user_id)
    {
        $authuser = Auth::user();

        $chats = DB::table('messages')
            ->where('messages.sender_id', '=', $authuser->id)
            //AND
            ->where('receiver_id', '=', $user_id)
            //OR
            ->orwhere('messages.sender_id', '=', $user_id)
            //AND
            ->where('messages.receiver_id', '=', $authuser->id)->get();

        $user = User::find($user_id);
        return view('pages.user')->with('user',$user)->with('messages',$chats);

    }
    public function messages(){
        $user = Auth::user();
        $messages = Message::where('receiver_id', '=', $user->id)->get();

        return view('pages.messages', ['messages' => $messages]);
    }

    public function getInfo(){
        return view('register.register');
    }
    public static function update(){
        $user = Auth::user();
        $time = date("Y-m-d H:i:s");
        $user->activity = $time;
        $user->online = true;
        $user->update();
    }
    public function postSaveAge(Request $request){
        $user = Auth::user();
        $user->age = $request['age'];
        $user->update();
        return view('register.location');
    }
    public function postSaveLocation(Request $request){
        $user = Auth::user();
        $user->location = $request['location'];
        $user->update();
        return view('register.bio');
    }

    public function postSaveBio(Request $request){
        $user = Auth::user();
        $user->bio = $request['bio'];
        $user->update();
        return view('register.img');
    }

    public function postSaveImg(Request $request){
        $user = Auth::user();
        $file = $request->file('image');
        $filename = $user->name . '-' . $user->id . '.jpg';

        if ($file) {

            Storage::disk('uploads')->put($filename, File::get($file));
        }
        $users = User::paginate(5);
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts])->with(['users' => $users]);
    }
}


