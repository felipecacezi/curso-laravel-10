<h1>Dúvida {{ $support->id }}</h1> <br>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text"
            name="subject"
            placeholder="Assunto"
            value="{{ $support->subject }}"/><br>
    <textarea name="body"
                cols="30"
                rows="10"
                placeholder="Descrição">{{ $support->body }}</textarea><br>
    <button type="submit">Enviar</button>
</form>
