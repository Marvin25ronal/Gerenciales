<?php
include "arriba.php";
 ?>
 <div class="latest-blog">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
<head>
    <style>
        .correcto {
            color: limegreen;
        }

        .incorrecto {
            color: orangered;
        }
    </style>
</head>

<div>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h2>Ventas</h2>
    </div>

    <div id="materiales-div">
        <div class="panel-body">
            
                <label for="a">Cliente:</label>
                <br />
                <input type="text" class="form-control" name=nombre id="nombre" placeholder="Nombre">
                <br />                    
                </select>
                <br />
                <label for="a">Nit:</label>
                <br />
                <input type="text" class="form-control" name=nit id="nit" placeholder="Nit">
                <br />
                <input id="btn" name="btn" type="submit" value="Registrar Datos Del Cliente" class="btn alert-success" />
                <br />
            
        </div>
    </div>

    <div>
        <h1>Detalles de la Venta</h1>        
                
                <h2>Cliente: <?php echo $_GET['cliente']; ?> Nit: <?php echo $_GET['nit']; ?> </h2>
    </div>
    <div>
        <div id="materiales-div">            
            <?php
                class product{
                    public $nombre;
                    public $precio;
                    public function __construct($name, $price)
                    {
                        $this->nombre = $name;
                        $this->precio = $price;
                    }
                }    
                ?>

            <div class="panel-body">
                
                    <label for="producto">Seleccione un producto:</label>
                    <select id="producto" name="producto" class="form-control">
                        
                            
                            foreach (Inventario.Objetos.ObjProducto prod in lista.getProductos())
                            {
                                <option value=@prod.idproducto> Producto </option>
                            }
                        
                    </select>

                    <br />
                    <label for="habitacion">Cantidad a restar:</label>
                    <br />
                    <input type="number" class="form-control" name=cantidad id="cantidad" placeholder="01234">
                    <br />
                    <input id="btn" name="btn" type="submit" value="Agregar a Carretilla" class="btn alert-success" />
                    <br />

                }
            </div>


            <br />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Precio Unitario</td>
                        <td>Cantidad</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>

                <tbody>
                    
                            List<Inventario.Objetos.ObjRestaxVenta> listaKardex = $_Session["CARRETILLA"] as List<Inventario.Objetos.ObjRestaxVenta>;

                            foreach (Inventario.Objetos.ObjRestaxVenta Venta in listaKardex)
                            {
                                <tr>
                                    <td>@Venta.descripcion</td>
                                    <td>@Venta.precio</td>
                                    <td>@Venta.cantidad</td>
                                    <td>@Venta.total</td>
                                </tr>
                            }
                        }
                    
                </tbody>
            </table>
            <br /><br />
            <a href="index.php" class="btn  btn-danger">Cancelar</a>
            <br /><br />
            <a href="@Url.Action("registrarVenta", "MODSAL_RestarPorVenta")" class="btn  btn-success">Registrar Venta</a>
        </div>


    </div>


</div>
       </div>
     </div>
 </div>
 <?php
include "abajo.php";
  ?>
