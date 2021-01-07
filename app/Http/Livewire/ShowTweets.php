<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = "Insira um tweet...";

    public function render()
    {
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function create(){
        if ($this->message !== 'Insira um tweet...' && $this->message !== '') {
            Tweet::create([
                'content' => $this->message,
                'user_id' => 1,
            ]);
        } else {
            dd('Você precisa inserir um tweet válido!');
        }

        $this->message = '';
    }
}
