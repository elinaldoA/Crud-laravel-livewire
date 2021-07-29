<?php

namespace App\Http\Livewire;

use Illuminate\View\Component;
use App\Models\Post;
use Illuminate\Http\Request;

class Posts extends Component
{
    public $posts, $titulo, $body, $post_id;
    public $updateMode=false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }
    private function resetInputFields()
    {
        $this->titulo = '';
        $this->body = '';
    }
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'titluo'=> 'required',
            'body'=> 'required',
        ]);

        Post::create($validatedDate);

        session()->flash('message', 'Post criado com sucesso!');

        $this->resetInputFields();
    }
    public function editar($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->titulo = $post->titulo;
        $this->body = $post->body;

        $this->updateMode = true;
    }
    public function Cancelar()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function Atualizar(Request $request)
    {
        $validatedDate = $request->validate([
            'titluo'=> 'required',
            'body'=> 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->Atualizar([
            'titulo' => $this->titulo,
            'body' => $this->body,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post atualizado com sucesso!');
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Excluído com sucesso!');
    }
}
