<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProductModel;
use App\Models\CommentModel;
use App\Models\CarouselModel;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function welcome() {
        // dd(session()->all());
        $reviews = new ProductModel(); //Получаем данные из БД
        $comment = new CommentModel();
        return view('welcome',['reviews' => $reviews->all(), 'comment' => $comment->all()]);
    }   

    public function addproduct() {
        return view('addproduct');
    }   

    public function addreviews($id) {
        $reviews = new ProductModel();
        $details = new UserDetails();
        $i = $details->where('user_id','=', auth()->user()->id)->count();
        return view('addreviews',['reviews' => $reviews->find($id), 'details' => $details->where('user_id','=', auth()->user()->id)->first(), 'i' => $i]);
    }

    public function addproducttable(Request $data) {
        $valid = $data -> validate([
            'foto' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'name' => ['required'],
            'text' => ['required'],
            'color' => ['required'],
            'price' => ['required']
        ]);

        $review = new ProductModel();
        // загрузка файла
        $file = $data->file('foto');
        $upload_folder = 'public/folder/'.$review->id; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения

        Storage::putFileAs($upload_folder, $file, $filename);

        $review->foto=$filename;
        $review->name=$data->input('name');
        $review->text=$data->input('text');
        $review->color=$data->input('color');
        $review->price=$data->input('price');
        $review->save();
        return redirect()->route('home');
    }

    public function detailed($id) {
        $reviews = new ProductModel();
        $comment = new CommentModel();
        $carousel = new CarouselModel();
        $i = CommentModel::where('reviews_id', '=', $id)->get()->count();
        $stars = CommentModel::where('reviews_id', '=', $id)->sum('star');
        if($stars == 0) {
            $estimation = 0;
        } else {
            $estimation = $stars/$i;
        }
        $icar = CarouselModel::where('car_id', '=', $id)->get()->count();
        $day = date("d");
        return view('detailed',['reviews' => $reviews->find($id),
                                'all' => $reviews->all(),
                                'comment' => $comment->where('reviews_id','=', $id)->get(),
                                'i' => $i,
                                'carousel' => $carousel->where('car_id','=', $id)->get(),
                                'icar' => $icar,
                                'id' => $id,
                                'estimation' => $estimation,
                                'day' => $day]);
    }

    public function addcomment(Request $data, $id) {
        $valid = $data -> validate([
            'text' => ['required'],
        ]);

        $i = UserDetails::where('user_id', '=', auth()->user()->id)->count();
        $user_id = $data->input('user_id');
        $details = UserDetails::find($user_id);

        $review = new CommentModel();
        $review->reviews_id=$data->input('reviews_id');
        $review->star=$data->input('star');
        if($i == 0) {
            $review->id_avatar='';
            $review->avatar='';
        } else {
            if($details->avatar == '') {
                $review->id_avatar='';
                $review->avatar='';
            } else {
            $review->id_avatar=auth()->user()->id.'/';
            $review->avatar=$details->avatar;
            }
        }
        $review->surname=auth()->user()->surname;
        $review->name=auth()->user()->name;
        $review->text=$data->input('text');
        $review->save();
        return redirect()->route('detailed',$id);
    }

    public function edit($id) {
        $reviews = new ProductModel();
        return view('edit',['reviews' => $reviews->find($id)]);
    }

    public function edit_product($id, Request $data) {

        $valid = $data -> validate([
            'foto' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
            'name' => ['required'],
            'text' => ['required'],
            'color' => ['required'],
            'price' => ['required']
        ]);

        // загрузка файла
        $review = ProductModel::find($id);

        $file = $data->file('foto');
        $upload_folder = 'public/folder'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
        Storage::delete($upload_folder.'/'.$review->foto);
        Storage::putFileAs($upload_folder, $file, $filename);

        $review->foto = $filename;
        $review->name=$data->input('name');
        $review->text=$data->input('text');
        $review->color=$data->input('color');
        $review->price=$data->input('price');
        $review->save();
        return redirect()->route('detailed',$id);
        }

        public function carousel($id) {
            $reviews = new ProductModel();
            return view('carousel',['reviews' => $reviews->find($id)]);
        }

        public function addcarousel($id, Request $data) {
            $valid = $data -> validate([
                'carousel' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
            ]);

            $review = new CarouselModel();
            $file = $data->file('carousel');
            $upload_folder = 'public/carousel/'.$review->id; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder.'/'.$review->carousel);
            Storage::putFileAs($upload_folder, $file, $filename);

            $review->carousel = $filename;
            $review->car_id = $data->input('car_id');
            $review->save();
            return redirect()->route('detailed',$id);
        }

        public function delete_product($id) {
            ProductModel::find($id)->delete();
            return redirect()->route('home');
        }
} 
