<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mascotas</title>
    <script src="js/jquery-3.3.1.min.js" ></script>
    <script src="js/sweetalert2.all.min.js" ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/index.js" ></script>

</head>
<body>
    <h1>AGREGAR MASCOTA</h1>
    <div class="contentText">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de mascota</label>
            <select class="form-select" aria-label="Default select example" id="SelectCategoria">
                
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Identificación</label>
            <input type="text" class="form-control" required id="codigo" placeholder="Identificación">
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control" required id="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Foto</label>
            <input type="text" class="form-control-file" name="foto" id="foto">
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Estado</label>
            <select class="form-select" id="estado" aria-label="Default select example">
                <option selected>Seleccionar</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>
        <div class="btn btn-primary" onclick="agregar()">Agregar</div>
    </form>

    <h2>Mis mascotas</h2>
    <div class="contentForm2">
        <input type="text" class="form-control" id="buscar" placeholder="Buscar por identificación">
        <div class="btn btn-primary" onclick="buscar()">Buscar</div>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Identificación</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody id="tbBody"></tbody>
    </table>



<div class="contentModal">
    <div id="conteEdit">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Identificación</label>
            <input type="text" class="form-control" required id="identificacionEditar" disabled>
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control" required id="nombreEditar" placeholder="Nombre">
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Foto</label>
            <div id="fotoEdit"></div>
        </div>
        <div class="mb-3 form-check">
            <label for="exampleInputPassword1" class="form-label">Estado</label>
            <select class="form-select" id="estadoEditar" aria-label="Default select example">
                <option selected>Seleccionar</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>
        <div class="btn btn-primary" onclick="update()">Modificar</div>
    </div>

</div>

</div>
</body>
</html>