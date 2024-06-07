<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Panel admin</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Recetas</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Borrar</th>
                <!-- Agrega más columnas según los campos de tus recetas -->
            </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $recipe): ?>
        <tr id="recipe-<?php echo $recipe->id; ?>">
            <td><?php echo $recipe->id; ?></td>
            <td><?php echo $recipe->name; ?></td>
            <td><?php echo $recipe->description; ?></td>
            <td>
                <button onclick="deleteRecipe(<?php echo $recipe->id; ?>)">Eliminar</button>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
function deleteRecipe(id) {
    if (confirm('Are you sure you want to delete this recipe?')) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?c=user&a=Borrar&id=' + id, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText == 'success') {
                    document.getElementById('recipe-' + id).remove();
                } else {
                    alert('Failed to delete the recipe');
                }
            }
        };
        xhr.send();
    }
}
</script>
