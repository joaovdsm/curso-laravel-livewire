<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $message = "Insira um tweet...";

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
        $tweets = Tweet::with('user')->paginate(2);

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function create(){

        $this->validate();

        if ($this->message !== 'Insira um tweet...') {
            Tweet::create([
                'content' => $this->message,
                'user_id' => 1,
            ]);
        }

        $this->message = '';
    }
}
