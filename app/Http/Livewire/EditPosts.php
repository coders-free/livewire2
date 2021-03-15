<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPosts extends Component
{

    public $open = false;

    public $post;

    protected $rules = [
        'post.title' => 'required|string|min:6',
        'post.content' => 'required|string|max:500',
    ];

    public function mount(Post $post){
        $this->post = $post;
    }


    public function render()
    {
        return view('livewire.edit-posts');
    }

    public function save(){
        $this->post->save();
        $this->reset('open');

        $this->emitTo('show-posts', 'render');

        $this->emit('message', 'El artículo se actualizar con éxito');
    }
}
