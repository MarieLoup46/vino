<h1>Ajouter bouteilles</h1>

<form method="POST" action="ajouter-bouteilles">
@csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombres des bouteilles dans la page:</label>
                    <select class="form-control" name="nombre" id="nombre">
                        <option value="24">24</option>
                        <option value="24">48</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="page" class="form-label">Nombres des pages:</label>
                    <select class="form-control" name="page" id="page">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>
</form>