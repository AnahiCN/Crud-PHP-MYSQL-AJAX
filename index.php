<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD AJAX+PHP+MYSQL</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/ajax.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Byspel.com</a>
                </div>
        </nav>
        <div class="container">
            <div class="starter-template">
                <h1>CRUD PHP+Mysql+AJAX</h1>
                <p class="lead">Aplicación gestión de clientes</p>
                <button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Nuevo
                </button>
            </div>
            
                 

                    <button type="button" class="btn btn-success" onCLick="history.go(0)" >Siguiente valor</button> 
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Usuarios</div>
                <table class="table">
                    <thead>
                        <tr>
                    
                            <th>Medida</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                           
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("clases/conexion.php");
                        $con = Conectar();
                        $sql = "SELECT  * FROM torques";
                        $stmt = $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                               
                                <td><?php print($row->medida); ?></td>
                                <td><?php print($row->fecha); ?></td>
                                <td><?php print($row->hora); ?></td>
                              
                                <td>
                                    
                                    <button class="btn btn-danger" onclick="Eliminar('<?php print($row->id); ?>');">Eliminar</button>
                          
                                </td>
                                 <td>
                                    <?php
                    include "clases/consultaArray.php";
                    ?>

                    <button type="button" class="btn btn-success" onCLick="history.go(0)" value="<?php echo $arr["medida"] ?>" <?php echo ($arr["medida"] >= 528 || $arr["medida"] <= 432 ? "disabled" : "") ?>>Siguiente valor</button>  
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Nuevo Usuario</h4>
                        </div>
                        <form role="form" action="" name="frmClientes" onsubmit="Registrar(idP, accion); return false">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input name="nombres" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>ocupacion</label>
                                    <input name="ocupacion" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input name="telefono" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Sitio Web</label>
                                    <input name="sitioweb" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-info btn-lg">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Registrar
                                </button>

                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i>x</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
                            var accion;
                            var idP;
                            function Nuevo() {
                                accion = 'N';
                                document.frmClientes.nombres.value = "";
                                document.frmClientes.ocupacion.value = "";
                                document.frmClientes.telefono.value = "";
                                document.frmClientes.sitioweb.value = "";
                                $('#modal').modal('show');
                            }
                            function Editar(id, nombres, ocupacion, telefono, sitioweb) {
                                accion = 'E';
                                idP = id;
                                document.frmClientes.nombres.value = nombres;
                                document.frmClientes.ocupacion.value = ocupacion;
                                document.frmClientes.telefono.value = telefono;
                                document.frmClientes.sitioweb.value = sitioweb;
                                $('#modal').modal('show');
                            }

        </script>
    </body>
</html>
