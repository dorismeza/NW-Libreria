
    <div class="container-md cart">
        <h1>Carrito de Compra</h1>
        <table>
            <tr>
                <th>Libros</th>
                <th>Cantidad</th>
                <th>ISV</th>
                <th>Subtotal</th>
            </tr>
            {{foreach ventaslib}}
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{coverart}}" alt="">
                        <div>
                            <p>{{nombrelibro}}</p>
                            <span>Precio: {{precio}}</span>
                            <br />
                            <input type="hidden" name="idcarrito" value="{{idcarrito}}">
                            <a href="index.php?page=carrito&mode=DEL&idcarrito={{idcarrito}}">remove</a>
                        </div>
                    </div>
                </td>
                <td><span>{{cantidad}}</span></td>
                <td>
                    <span>L. {{impuestos}}</span>
                </td>
                <td>L. {{subtotal}}</td>
            </tr>
            {{endfor ventaslib}}


        </table>

        <div class="total-price">
            <table>
                {{foreach total}}
                <tr>
                    <td>Subtotal</td>
                    <td>L. {{subtotal}}</td>
                </tr>
                <tr>
                    <td>Impuesto</td>
                    <td>L. {{impuesto}}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>L. {{total}}</td>
                </tr>
                {{endfor total}}
            </table>
            <button type="submit" class="checkout btn" name="btnPagar" id="btnPagar">Proceder a Pagar</button>
        </div>
    </div>
    <script>
  document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('btnPagar').addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      window.location.href = 'index.php?page=checkout_checkout';
    });
  });
</script>
<!--</form>-->