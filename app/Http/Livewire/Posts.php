<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

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
    public function store()
    {
        $validatedDate = $this->validate([
            'titulo'=> 'required',
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
    public function cancelar()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'titulo'=> 'required',
            'body'=> 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update([
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
