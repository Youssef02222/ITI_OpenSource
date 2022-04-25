<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Post {


    

    public static $posts = [
        ["id"=>1, "title"=>"PHP", "description"=>"PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. ", "posted_by"=> "Youssef", "created_at"=> '2020-02-03'],
        ["id"=>2, "title"=>"java", "description" => "PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. ", "posted_by"=> "Ibrahem", "created_at"=> '2021-02-02'],
        ["id"=>3, "title"=>"C++", "description" => "PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. ", "posted_by"=> "Salama", "created_at"=> '2019-05-03'],
        ["id"=>4, "title"=>"Python", "description" => "PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. ", "posted_by"=> "Ahmed", "created_at"=> '2022-01-03']
    ];

    static function all() {
        return self::$posts;
    }

    static function find($id) {
        foreach(self::$posts as $post) {
            if($post['id'] == $id) {
                return $post;
            }
        }
    }

    static function delete($id) {
        self::$posts = array_filter(self::$posts, function($post) use($id) {
            return $post['id'] != $id;
        });
    }
}

class PostController extends Controller
{
    public function index() {
        
        return view("posts.index", [
            'posts' => Post::all()
        ]);
    }

    
   
    public function create(){
        return view('posts.create');
    }

    public function store(){
        return redirect()->route('posts.index');
    }


    public function show($postId){
        return view('posts.show', ['post'=> Post::find($postId)]);
    }

    public function edit($postId){
        return view('posts.create' , ['post'=>Post::find($postId)]);
    }


    public function destroy($postId) {
         Post::delete($postId);
        return redirect()->route('posts.index');    
    }

    


}