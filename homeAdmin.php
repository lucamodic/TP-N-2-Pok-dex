<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="fondo">
<header>
    <div class="container-fluid p-5 bg-dark text-white text-center d-flex">
        <a href="home.php"><img width="210" src="/Pokedex/Images/pokemonLogo.png" alt=""></a>
        <h1 class="titulo">Pokedex</h1>
        <div class="form">
            <input  type="text" name="usuario" id="usuario" placeholder="Usuario">
            <input  type="password" name="pass" id="pass" placeholder="Password">
            <button type="button" class="btn btn-warning btn-sm boton">Login</button>
        </div>
    </div>
    <form  action="buscarPokemon.php" method="GET" enctype="application/x-www-form-urlencoded">
        <div class="input-group mb-3 p-2 container">
            <input type="text" id ="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre,tipo o número de pokémon" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Quien es este pokemon?" class="input-group-text" id="basic-addon2">
        </div>
    </form>
</header>

<div class="container mt-3">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>A</td>
            <td>Planta</td>
            <td>1</td>
            <td>Bulbasaur</td>
            <td><button type="button" class="btn btn-primary">Modificacion</button>  <button type="button" class="btn btn-danger">Baja</button></td>
        </tr>
        <tr>
            <td>B</td>
            <td>Planta</td>
            <td>2</td>
            <td>Ivysaur</td>
            <td><button type="button" class="btn btn-primary">Modificacion</button>  <button type="button" class="btn btn-danger">Baja</button></td>
        </tr>
        <tr>
            <td>C</td>
            <td>Planta, Veneno</td>
            <td>3</td>
            <td>Venusaur</td>
            <td><button type="button" class="btn btn-primary">Modificacion</button>  <button type="button" class="btn btn-danger">Baja</button></td>
        </tr>
        <tr>
            <td>D</td>
            <td>Fuego</td>
            <td>4</td>
            <td>Charmander</td>
            <td><button type="button" class="btn btn-primary">Modificacion</button>  <button type="button" class="btn btn-danger">Baja</button></td>
        </tr>
        </tbody>
    </table>

</div>

</body>

