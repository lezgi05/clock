<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function sign_in() {
        return view('sign_in');
    }

    public function registr() {
        return view('registr');
    }

    public function reg(Request $data) {
        
        $valid = $data->validate([
            'tel' => ['required', 'string', 'min:9'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        $user = User::create([
            'tel' => $data['tel'],
            'status' => 0,
            'name' => '',
            'surname' => '',
            'patronymic' => '',
            'password' => bcrypt($data['password']),
        ]);

        if ($user) {
            auth('web')->login($user);
        }
        
        return redirect()->route('cabinet');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'tel' => ['required', 'string', 'min:9'],
            'password' => ['required', 'min:8']
        ]);
    
        if (auth('web')->attempt($data)) {
            return redirect()->route('cabinet');
        } else {
            return redirect()->route('sign_in')->withErrors([
                'tel' => 'Телефон или пароль не совпадают'
            ]);
        }
    }

    public function addname($id, Request $data) {
        $valid = $data -> validate([
            'name' => 'required|min:2|max:15',
            'surname' => 'required|min:2|max:15',
            'patronymic' => '',
        ]);

        $review = User::find($id);
        $review->surname = $data->input('surname');
        $review->name = $data->input('name');
        if($data->input('patronymic') == '') {
            $review->patronymic = '';
        } else {
            $review->patronymic = $data->input('patronymic');
        }
        $review->save();
        return redirect()->route('personal');
    }

    public function exit()
    {
        auth('web')->logout();
        return redirect()->route('home');
    }

    public function personal() {
        $reviews = new UserDetails();
        $i = $reviews->where('user_id','=', auth()->user()->id)->count();
        return view('personal',['details' => $reviews->where('user_id','=', auth()->user()->id)->first(), 'i' => $i]);
    }

    public function cabinet() {
        $reviews = new UserDetails();
        $i = $reviews->where('user_id','=', auth()->user()->id)->count();
        return view('cabinet',['details' => $reviews->where('user_id','=', auth()->user()->id)->first(), 'i' => $i]);
    }

    public function addavatar($id, Request $data) {
        $valid = $data->validate([
           'avatar' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp']
        ]);
    
        $review = new UserDetails();
        $i = $review->where('user_id','=', auth()->user()->id)->count();
    
        if($i == 0){
            $file = $data->file('avatar');
            $upload_folder = 'public/avatar/'.auth()->user()->id; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder.'/'.$review->avatar);
            Storage::putFileAs($upload_folder, $file, $filename);        
            $review->user_id=auth()->user()->id;
            $review->avatar=$filename;
            $review->email='';
            $review->email_verified_at='';
            $review->day='';
            $review->mounth='';
            $review->year='';
            $review->gender='';
            $review->save();
        } else {
            $review = UserDetails::find($id);
            $file = $data->file('avatar');
            $upload_folder = 'public/avatar/'.auth()->user()->id; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder.'/'.$review->avatar);
            Storage::putFileAs($upload_folder, $file, $filename);
            $review->avatar=$filename;
            $review->save();
        }
        return redirect()->route('personal');
    }

    public function addemail($id, Request $data) {
        $review = new UserDetails();
        $i = $review->where('user_id','=', auth()->user()->id)->count();
        if($i == 0){
        $review->user_id=auth()->user()->id;
        $review->avatar='';
        $review->email=$data->input('email');
        $review->email_verified_at='';
        $review->day='';
        $review->mounth='';
        $review->year='';
        $review->gender='';
        $review->save();
        } else {
        $review = UserDetails::find($id);
        $review->email = $data->input('email');
        $review->save();
        }
        return redirect()->route('personal');
    }

    public function adddate($id, Request $data) {
        $review = new UserDetails();
        $i = $review->where('user_id','=', auth()->user()->id)->count();
        if($i == 0){
        $review->user_id=auth()->user()->id;
        $review->avatar='';
        $review->email='';
        $review->day=$data->input('day');
        $review->mounth=$data->input('mounth');
        $review->year=$data->input('year');
        $review->gender='';
        $review->save();
        $route = auth()->user()->id;
        } else {
        $review = UserDetails::find($id);
        $review->day=$data->input('day');
        $review->mounth=$data->input('mounth');
        $review->year=$data->input('year');
        $review->save();
        $route = $review->id;
        }
        return redirect()->route('personal');
    }

    public function addgender($id, Request $data) {
        $review = new UserDetails();
        $i = $review->where('user_id','=', auth()->user()->id)->count();
        if($i == 0){
        $review->user_id=auth()->user()->id;
        $review->avatar='';
        $review->email='';
        $review->email_verified_at='';
        $review->day='';
        $review->mounth='';
        $review->year='';
        $review->gender=$data->input('gender');
        $review->save();
        } else {
        $review = UserDetails::find($id);
        $review->gender = $data->input('gender');
        $review->save();
        }
        return redirect()->route('personal');
    }
}
