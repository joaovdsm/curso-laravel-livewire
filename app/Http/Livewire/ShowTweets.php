<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $message = "";

    protected $rules = [
        'message' => 'required|min:3|max:255'
    ];

    public function messages(){
        return [
            'message.required' => 'O seu tweet não pode estar em branco!',
            'message.min' => 'O seu tweet precisa ter no minimo 3 caracteres',
            'message.max' => 'O seu tweet precisa ter no maximo 255 caracteres'
        ];
    }

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(7);

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function create(){

        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->message,
        ]);

        // Tweet::create([
        //     'content' => $this->message,
        //     'user_id' => auth()->user()->id
        // ]);

        $this->message = '';
    }

    public function like($idTweet) {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet){
        $tweet->likes()->delete();
    }
}
