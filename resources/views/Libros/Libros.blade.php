<html>
<body>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de libros</h3>

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="tablaAlumnos" class="table table-hover">
                    <thead>
                    <tr>
                        <th>nombre</th>
                        <th>codigo de barra</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($libros as $libro)
                        <tr>
                            <td>{{$libro->nombre}}</td>
                            <td>{!! DNS1D::getBarcodeHTML($libro->codigo_barra, "C128") !!}</td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
</body>
</html>