<h1>Nova Dúvida</h1> <br>

<form action="{{ route('supports.store') }}" method="POST">
    @csrf
    <input type="text" name="subject" placeholder="Assunto"> <br>
    <textarea name="body" cols="30" rows="10" placeholder="Descrição"></textarea> <br>
    <button type="submit">Enviar</button>
</form>
