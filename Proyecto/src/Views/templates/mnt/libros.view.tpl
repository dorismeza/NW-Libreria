<!--<style>
    td {
        text-align: center;
    }
button{
  background-color: #4c53af !important;
  border-color: #4c53af !important;
  display: block;
  border-radius: 10px;
  color: aliceblue !important;
  width: 120px;
  }
  .eliminar{
  background-color: #ff0000 !important;
  border-color: #ff0000 !important;
  display: block;
  border-radius: 10px;
  color: aliceblue !important;
  width: 120px;
  }
 .nuevo{
  background-color: #07da35 !important;
  border-color: #07da35 !important;
  display: block;
  border-radius: 10px;
  color: aliceblue !important;
  width: 120px;
  }
   .formulario{
    padding: 50px;
    background-color: #d37800 !important;
  }
</style>-->
<h1>Gestión de Libros</h1>
<section class="WWFilter">

</section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  
<body >
<section class="WWList">
  <table class="table table-lg">
    <thead class="thead-dark thead-light">
      <tr >
        <th scope="col">Código</th>
        <th scope="col">Libros</th>
        <th>
          {{if new_enabled}}
          <button id="btnAdd" class="btn btn-primary btn-sm btn-block">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody >
      {{foreach items}}
      <tr>
        <td scope="row">{{idlibros}}</td>
        <td><a href="index.php?page=mnt_libro&mode=DSP&idlibros={{idlibros}}">{{nombreLibro}}</a></td>
        <td>
          {{if ~edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_libro"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idlibros" value={{idlibros}} />
              <button type="submit" class="btn btn-dark btn-sm btn-block">Editar</button>
          </form>
          <p>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_libro"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idlibros" value={{idlibros}} />
              <button type="submit" class="btn btn-danger btn-sm btn-block">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
</body>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_libro&mode=INS&idlibros=0");
      });
    });
</script>
