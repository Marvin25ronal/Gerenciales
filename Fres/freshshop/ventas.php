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
            @using (Html.BeginForm("addDatosCliente", "MODSAL_RestarPorVenta", FormMethod.Post))
            {
                <label for="a">Cliente:</label>
                <br />
                <input type="text" class="form-control" name=nombre id="nombre" placeholder="Nombre">
                <br />

                <label for="aa">Pais de origen:</label>
                <select id="pais" name="pais" class="form-control">
                    @using (Html.BeginForm())
                    {
                        Inventario.Controllers.MODSAL_RestarPorVentaController lista = new Inventario.Controllers.MODSAL_RestarPorVentaController();
                        foreach (Inventario.Objetos.ObjPais prod in lista.getPaises())
                        {
                            <option value=@prod.id> @prod.nombre </option>
                        }
                    }
                </select>
                <br />
                <label for="a">Nit:</label>
                <br />
                <input type="text" class="form-control" name=nit id="nit" placeholder="Nit">
                <br />

                <input id="btn" name="btn" type="submit" value="Registrar Datos Del Cliente" class="btn alert-success" />
                <br />
            }
        </div>
    </div>

    <div>
        <h1>Detalles de la Venta</h1>
        @{
            if (Session["CLIENTE"] != null)
            {
                <h2>Cliente: @Session["CLIENTE"]          Nit: @Session["NIT"]</h2>
            }
        }
    </div>

    @*------------- Registrar Venta -------------*@
    <div>
        <div id="materiales-div">
            <br />
            <a href="@Url.Action("mostrandoProductos", "MODSAL_RestarPorVenta")" class="btn btn-primary">Ver Detalle De Productos Existentes</a>
            <br />

            <div class="panel-body">
                @using (Html.BeginForm("addCarretilla", "MODSAL_RestarPorVenta", FormMethod.Post))
                {
                    <label for="producto">Seleccione un producto:</label>
                    <select id="producto" name="producto" class="form-control">
                        @using (Html.BeginForm())
                        {
                            Inventario.Controllers.MODSAL_RestarPorVentaController lista = new Inventario.Controllers.MODSAL_RestarPorVentaController();
                            foreach (Inventario.Objetos.ObjProducto prod in lista.getProductos())
                            {
                                <option value=@prod.idproducto> @prod.descripcion - Existencias: @prod.cantidad </option>
                            }
                        }
                    </select>

                    <br />
                    <label for="habitacion">Cantidad a restar:</label>
                    <br />
                    <input type="number" class="form-control" name=cantidad id="cantidad" placeholder="01234">
                    <br />
                    if (Session["ERROR_RESTA"] != null)
                    {
                        if (Session["ERROR_RESTA"].ToString().Equals("Yes"))
                        {
                            <label class="correcto">Resta Exitosa...!!!</label>
                            Session["ERROR_RESTA"] = null;
                        }
                        else
                        {
                            <label class="incorrecto">@Session["ERROR_RESTA"].ToString()</label>
                            Session["ERROR_RESTA"] = null;
                        }
                        <br />
                    }
                    <input id="btn" name="btn" type="submit" value="Agregar a Carretilla" class="btn alert-success" />
                    <br />

                }
            </div>


            <br />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Descripción</td>
                        <td>Precio Unitario</td>
                        <td>Cantidad</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>

                <tbody>
                    @{
                        if (Session["CARRETILLA"] != null)
                        {
                            List<Inventario.Objetos.ObjRestaxVenta> listaKardex = Session["CARRETILLA"] as List<Inventario.Objetos.ObjRestaxVenta>;

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
                    }
                </tbody>
            </table>
            <br /><br />
            <a href="@Url.Action("cancelarVenta", "MODSAL_RestarPorVenta")" class="btn  btn-danger">Cancelar</a>
            <br /><br />
            <a href="@Url.Action("registrarVenta", "MODSAL_RestarPorVenta")" class="btn  btn-success">Registrar Venta</a>
            <br /><br />
            <a href="@Url.Action("vMODINI_Logeado", "MODINI_Logeado")" class="btn  btn-warning">Regresar</a>
        </div>


    </div>


</div>
       </div>
     </div>
 </div>
 <?php
include "abajo.php";
  ?>
