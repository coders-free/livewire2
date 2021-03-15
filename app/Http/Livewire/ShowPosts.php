<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $search;

    public $orderBy="id";
    public $order="desc";
    public $cantidad = 10;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $posts = Post::where('title', 'like', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->cantidad);

        return view('livewire.show-posts', compact('posts'));
    }

    public function order($orderBy){
        if ($this->orderBy == $orderBy) {

            if ($this->order == "asc") {
                $this->order = "desc";
            }else{
                $this->order = "asc";
            }
            
        }else{
            $this->order = "asc";
        }

        $this->orderBy = $orderBy;
    }
}
