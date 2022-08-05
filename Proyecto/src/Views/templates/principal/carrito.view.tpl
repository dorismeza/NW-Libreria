<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<div class="container-md cart">
    <h3 class="is-size-2">Carrito de Compra</h3>
   
    <table class="table ">
        <thead class="thead-light">
            <tr>
                <th>Libro</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th> </th>
            </tr>
        </thead>
        {{foreach ventaslib}}
        <tr>
            <td>
                <img src="{{coverart}}" alt="" width="50px">
            </td>
            <td>
                <p>{{nombrelibro}}</p>
            </td>
            <td>
                <span>L. {{precio}}</span>
                <br />
                <input type="hidden" name="idcarrito" value="{{idcarrito}}">
            </td>
            <td><span>{{cantidad}}</span></td>

            <td>L. {{subtotal}}</td>
            <td>
                <a type="button" class=" button btn-outline-danger fa fa-trash-o btn-lg btn-lg" role="button"
                    href="index.php?page=carrito&mode=DEL&idcarrito={{idcarrito}}"></a>
            </td>
        </tr>
        {{endfor ventaslib}}


    </table>

    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <table class="table table-borderless float-left">
                    {{foreach total}}
                    <tr>
                        <td><b>Subtotal</b></td>
                        <td>L. {{subtotal}}</td>
                    </tr>
                    <tr>
                        <td><b>Impuesto</b></td>
                        <td>L. {{impuesto}}</td>
                    </tr>

                    <tr class="table-secondary">

                        <td><b>Total</b> </td>
                        <td>L. {{total}}</td>


                    </tr>
                    {{endfor total}}
                </table>
                <br>
                <button type="submit" class="btn btn-success" name="btnPagar" id="btnPagar">Proceder a Pagar</button>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('btnPagar').addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = 'index.php?page=checkout_checkout';
        });
    });
</script>
<!--</form>-->