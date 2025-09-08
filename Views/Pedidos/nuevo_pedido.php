<?php require_once "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header">
        <div class="card-title">Nuevo pedido</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group row col-md-8">
                <div class="form-group col-md-3">
                    <label for="nrofactura">Nro. Factura</label>
                    <input type="number" id="nrofactura" name="nroFactura" class="form-control">

                </div>
                <div class="form-group col-md-3">
                    <label for="actEconomica">Act. Economica</label>
                    <input type="number" id="actEconomica" name="actEconomica" class="form-control">

                </div>
                <div class="form-group col-md-3">
                    <label for="tipoDocumento">Tipo documento</label>
                    <select id="tipoDocumento" name="tipoDocumento" class="form-control">
                        <option value="1">Celula</option>
                        <option value="5">NIT</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="documentoid">NIT/ CI</label>
                    <div class="input-group-append">
                        <input type="text" id="documentoid" name="documentoid" class="form-control">
                        <button class="btn btn-outline-secondary" onclick="buscarCliente()"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="razon_social">Razon social</label>
                    <input type="text" id="razon_social" name="razon_social" class="form-control">

                </div>
                <div class="form-group col-md-6">
                    <label for="cliente_email">Correo electronico</label>
                    <input type="text" id="cliente_email" name="cliente_email" class="form-control">

                </div>
            </div>
            <div class="form-group col-md-4">

            </div>
        </div>
    </div>
</div>
<?php require_once "Views/Templates/footer.php"; ?>