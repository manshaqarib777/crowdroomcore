<?php
namespace Modules\Contact\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Modules\Contact\Emails\NotificationToAdmin;
use Modules\Contact\Emails\SpaceRequestNotificationToAdmin;
use Modules\Contact\Emails\HomeRequestNotificationToAdmin;
use Modules\Contact\Models\Contact;
use Modules\Contact\Models\SpaceRequest;
use Modules\Contact\Models\HomeRequest;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\User;
use App\SpaceBudget;
use App\SpaceRequirement;
use App\SpaceAttendee;
use App\SpaceLocation;
use App\SpaceType;
use App\SpaceDuration;


use App\HomeBudget;
use App\HomeRequirement;
use App\HomeLocation;
use App\HomeBedroom;
use App\HomeRentalTerm;
use App\HomePreferredArea;
use App\HomeAmenity;
use App\HomeDuration;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//all-new-update

class ContactController extends Controller
{
    // use AuthorizesRequests;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $data = [
            'page_title' => __("Contact Page")
        ];
        return view('Contact::index', $data);
    }

    public function space_request(Request $request)
    {
        $spaceBudgets=SpaceBudget::get();
        $spaceRequirements=SpaceRequirement::get();
        $spaceAttendees=SpaceAttendee::get();
        $spaceLocations=SpaceLocation::get();
        $spaceTypes=SpaceType::get();
        $spaceDurations=SpaceDuration::get();


        $data = [
            'page_title'         => __("Find Your Ideal Space"),
            'spaceBudgets'       => $spaceBudgets,
            'spaceRequirements'  => $spaceRequirements,
            'spaceAttendees'     => $spaceAttendees,
            'spaceLocations'     => $spaceLocations,
            'spaceTypes'         => $spaceTypes,
            'spaceDurations'      => $spaceDurations,

        ];
        return view('Contact::space-request', $data);
    }
    public function space_request_store(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
        ]);
        if(!auth()->check())
        {
            $response = $this->dologin($request);
            if($response==false)
            {
                $data = [
                    'status'    => 0,
                    'message'    => __('Your Password is incorrect'),
                ];
                return response()->json($data, 200);
            }
        }
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                $data = [
                    'status'    => 0,
                    'message'    => __('Please verify the captcha'),
                ];
                return response()->json($data, 200);
            }
        }
        $input =$request->all();
        if($request->input('requirement')!=null)
        $input['requirement_id']=implode(',',$request->input('requirement'));
        $input['user_id']=auth()->user()->id;
        $row = new SpaceRequest($input);
        $row->status = 'sent';
        if ($row->save()) {
            if($admin_email = setting_item('admin_email')){
                try {
                    Mail::to($admin_email)->send(new SpaceRequestNotificationToAdmin($row));
                }catch (Exception $exception){
                    Log::warning("Contact Send Mail: ".$exception->getMessage());
                }
            }
            $data = [
                'status'    => 1,
                'message'    => __('Thank you for contacting us! We will get back to you soon'),
            ];
            return response()->json($data, 200);
        }
    }


    public function home_request(Request $request)
    {
        $spaceBudgets=HomeBudget::get();
        $spaceRequirements=HomeRequirement::get();
        $spaceBedrooms=HomeBedroom::get();
        $spaceLocations=HomeLocation::get();
        $spaceRentalTerms=HomeRentalTerm::get();
        $spacePreferredAreas=HomePreferredArea::get();
        $spaceAmenities=HomeAmenity::get();
        $spaceDurations=HomeDuration::get();
        $data = [
            'page_title' => __("Find Your Next Home"),
            'spaceBudgets'       => $spaceBudgets,
            'spaceRequirements'  => $spaceRequirements,
            'spaceBedrooms'      => $spaceBedrooms,
            'spaceLocations'     => $spaceLocations,
            'spaceRentalTerms'   => $spaceRentalTerms,
            'spacePreferredAreas'=> $spacePreferredAreas,
            'spaceAmenities'      => $spaceAmenities,
            'spaceDurations'      => $spaceDurations
        ];
        return view('Contact::home-request', $data);
    }

    function dologin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|confirmed',
        ]);
        if ($validator->fails()) {
            $data = [
                'status'    => 0,
                'message'    => __('Your Password is incorrect'),
            ];
            return response()->json($data, 200);
        }
        $user = User::where('email',$request->input('email'))->first();
        if (!isset($user) && empty($user)) {
            $user = new User();
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->name = $request->input('name');
            $user->first_name = $request->input('name');
            $user->last_name = $request->input('name');
            $user->is_verified = 1;
            $user->phone = $request->input('phone');
            $user->status = 'publish';
            $user->save();
            $user->assignRole('customer');
        }
        $login_credentials=array(
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        );
        Auth::attempt($login_credentials);
        return true;
    }
    public function home_request_store(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
        ]);
        /**
         * Google ReCapcha
         */

        if(!auth()->check())
        {
            $response = $this->dologin($request);
            if($response==false)
            {
                $data = [
                    'status'    => 0,
                    'message'    => __('Your Password is incorrect'),
                ];
                return response()->json($data, 200);
            }
        }
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                $data = [
                    'status'    => 0,
                    'message'    => __('Please verify the captcha'),
                ];
                return response()->json($data, 200);
            }
        }
        $input =$request->all();
        $input['rental_term_id']=implode(',',$request->input('rental_terms'));
        if($request->input('amenities')!=null)
            $input['amenity_id']=implode(',',$request->input('amenities'));
        //dd($request->input('amenities'));
        if($request->input('requirement')!=null)
        $input['requirement_id']=implode(',',$request->input('requirement'));
        $input['user_id']=auth()->user()->id;
        $row = new HomeRequest($input);
        $row->status = 'sent';
        if ($row->save()) {
            if($admin_email = setting_item('admin_email')){
                try {
                    Mail::to($admin_email)->send(new HomeRequestNotificationToAdmin($row));
                }catch (Exception $exception){
                    Log::warning("Contact Send Mail: ".$exception->getMessage());
                }
            }
            $data = [
                'status'    => 1,
                'message'    => __('Thank you for contacting us! We will get back to you soon'),
            ];
            return response()->json($data, 200);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
            'message' => ['required']
        ]);
        /**
         * Google ReCapcha
         */
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                $data = [
                    'status'    => 0,
                    'message'    => __('Please verify the captcha'),
                ];
                return response()->json($data, 200);
            }
        }
        $row = new Contact($request->input());
        $row->status = 'sent';
        if ($row->save()) {
            $this->sendEmail($row);
            $data = [
                'status'    => 1,
                'message'    => __('Thank you for contacting us! We will get back to you soon'),
            ];
            return response()->json($data, 200);
        }
    }

    protected function sendEmail($contact){
        //dd($contact->user);
        if($admin_email = setting_item('admin_email')){
            try {
                Mail::to($admin_email)->send(new NotificationToAdmin($contact));
            }catch (Exception $exception){
                Log::warning("Contact Send Mail: ".$exception->getMessage());
            }
        }
    }

    public function t(){
        return new NotificationToAdmin(Contact::find(1));
    }
}
