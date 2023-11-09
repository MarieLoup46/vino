<form action="{{ route('cellier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nomDuCellier">Nom du cellier:</label>
        <input type="text" class="form-control" id="nomDuCellier" name="nom" placeholder="" required>
    </div>
    <button type="submit" class="btn-submit">Créer un cellier</button>
</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
