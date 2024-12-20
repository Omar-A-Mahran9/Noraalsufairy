<?php

namespace App\Http\Controllers\Api\Auth;

use App\Enums\VendorStatus;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\LoginUserRequest;
use App\Http\Requests\Site\StoreUserRequest;
use App\Models\Favorite;
use App\Models\OrderNotification;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function register(StoreUserRequest $request)
    {
        $data             = $request->except('password_confirmation');
        $data['password'] = $data['password'];
        $data['status']=1;
        $data['phone']=convertArabicNumbers($request->phone);
            
        $user = Vendor::create($data);

        $user->sendOTP();
        // OtpLink($user->phone,$user->verification_code??'-');
 
        $userWithoutVerificationCode = new User($user->toArray());
         // unset($userWithoutVerificationCode->verification_code);
       
        return $this->success(data: ['token' => $user->createToken("API TOKEN")->plainTextToken, 'vendor' => $userWithoutVerificationCode]);
    }

    public function login(LoginUserRequest $request)
    {
          $phone=convertArabicNumbers($request->phone);
          $email=$request->email;
           if (!Auth::guard('vendor')->attempt(['email'=>$email, 'password' => $request->password], true))
        {
            if (!Auth::guard('vendor')->attempt(['phone'=>$phone, 'password' => $request->password], true))
            {
            $errors = [
                'login' => [__('Invalid credentials')],
                // 'another_key' => ['Another error message'],
            ];
         
            return $this->validationFailure(errors:  $errors);
        }
        }
        if( Auth::guard('vendor')->user()->verification_code!=Null){
            $token=Null;
            $massage = __('Hello') . ' ' . Auth::guard('vendor')->user()->name . ' ' . __('Please verify Your Phone');
            $otp=Auth::guard('vendor')->user()->verification_code ;
            
            $user=Vendor::find(Auth::guard('vendor')->user()->id);
            $user->sendOTP();

            // OtpLink(Auth::guard('vendor')->user()->phone,Auth::guard('vendor')->user()->verification_code);

            return $this->validationFailure(errors:['message'=>$massage,'phone'=>str_replace('966',' ',Auth::guard('vendor')->user()->phone),'otp'=> $otp]);
        }
        else{

            if(Auth::guard('vendor')->user()->status != 2){
                if(Auth::guard('vendor')->user()->status==1){
                      return $this->validationFailure(errors:['message'=>__('this account is pending please wait for admin approval')]);
                }
                elseif(Auth::guard('vendor')->user()->status==0){
                    return $this->validationFailure(errors:['message'=>__('this account is blocekd please contact with admin')]);
                }
                elseif(Auth::guard('vendor')->user()->status==3){
                    return $this->validationFailure(errors:['message'=>__('this account is rejected please create new account or contact with admin')]);
                }
            }
            else{
                 $token=Auth::guard('vendor')->user()->createToken("API TOKEN")->plainTextToken;
                $ip=$request->getClientIp();
                return $this->success(data: ['token' => $token, 'massage'=>"Thank You for verified",'user' => Auth::guard('vendor')->user()]);
            }
           

        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout(); // Use Auth::logout() to log out the authenticated user
            return $this->success();
        } else {
            return $this->failure(message: __('You have to log in'));
        }
    }
}