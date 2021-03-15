<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class DeletePosts extends Component
{

    public $post;
    public $open = false;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.delete-posts');
    }

    public function delete(){
        $this->post->delete();

        $this->reset('open');

        $this->emitTo('show-posts','render');
        $this->emit('message', 'El artículo se logro eliminó con éxito');
        
    }
}
