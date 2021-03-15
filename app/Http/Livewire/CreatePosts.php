<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePosts extends Component
{
    use WithFileUploads;

    public $open = false;
    
    public $post, $photo;

    protected $rules = [
        'post.title' => 'required|string|min:6',
        'post.content' => 'required|string|max:500',
        'photo'         => 'required'
    ];

    public function mount(){
        $this->post = new Post();
    }

    public function render()
    {
        return view('livewire.create-posts');
    }

    public function save(){

        $this->validate();

        $this->post->save();
        $this->post = new Post();
        $this->emit('saved');
    
    }
    
}
