<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr class="text-center">
                <th>Código</th>
                <th>Titulo</th>
                <th>Body</th>
                <th width="150px">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
        <tr class="text-center">
            <td>{{ $post->id }}</td>
            <td>{{ $post->titulo }}</td>
            <td>{{ $post->body }}</td>
            <td>
            <button wire:click="editar({{ $post->id }})" class="btn btn-primary btn-sm">Editar</button>
            <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Excluir</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
