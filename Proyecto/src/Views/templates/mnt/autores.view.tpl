<!--<style>
  td{
    text-align: center;
  }

  .crud{
    display: flex;
    width: 150px;
  }

  .editar{
    margin-right: 10px;
  }
</style>-->


<h1>Gestión de Autores</h1>
<section class="WWFilter">

</section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  
<section class="WWList">
  <table class="table table-lg">
    <thead class="thead-dark thead-light">
      <tr>
        <th scope="col">Código Autor</th>
        <th scope="col">Nombre del Autor</th>
        <th scope="col">Apellido Autor</th>
        <th scope="col">Genero del Autor</th>
        <th>
          {{if new_enabled}}
          <button id="btnAdd" class="btn btn-primary btn-sm btn-block">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td scope="row">{{idAutor}}</td>
        <td><a href="index.php?page=mnt_autor&mode=DSP&idAutor={{idAutor}}">{{nombreAutor}}</a></td>
        <td>{{apellidoAutor}}</td>
        <td>{{genero}}</td>
        <td class="crud">
          {{if ~edit_enabled}}
          <form action="index.php" method="get" class="editar">
             <input type="hidden" name="page" value="mnt_autor"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idAutor" value={{idAutor}} />
              <button type="submit" class="btn btn-dark btn-sm btn-block">Editar</button>
          </form>
          <p>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get" class="eliminar">
             <input type="hidden" name="page" value="mnt_autor"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idAutor" value={{idAutor}} />
              <button type="submit" class="btn btn-danger btn-sm btn-block">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_autor&mode=INS&idAutor=0");
      });
    });
</script>
