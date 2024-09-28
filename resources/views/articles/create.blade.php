<x-layout>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <section class="container storeform mt-4 p-3 rounded">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('articles.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo dell'articolo</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Descrizione dettagliata dell'articolo"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea l'articolo</button>
                </form>
            </div>
        </div>
    </section>

</x-layout>