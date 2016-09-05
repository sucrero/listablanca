<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Blanca
        <small></small>
      </h1>
    </section>
        
    <!-- Main content -->
    <section class="content" id="contenido">
        <!-- inicio -->
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bancos</h3>

              <div class="box-tools">
                <div style="width: 150px;" class="input-group input-group-sm">
                  <input type="text" placeholder="Search" class="form-control pull-right" name="table_search">

                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        <!-- fin -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Administrar Lista Blanca</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="lista">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="descripcion">Descripci&oacute;n</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripci&oacute;n">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <div class="input-group">
                                    <span class="input-group-addon">http://www.</span>
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Ingrese la url">
                                </div>
                            </div>

                            <div class="form-group">
                              <label>Tipo</label>
                              <div id="combtipo"></div>
                            </div>
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <button type="submit" id="guardarlista" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
                </div>
              <!-- /.box -->
            </div>
        <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar Men&uacute;</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="tipo">
                  <div class="box-body">
                    <div class="form-group">
                        <label for="descripcion">Descripci&oacute;n</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripci&oacute;n">
                    </div>
                      <div class="form-group">  
                        <label for="descripcion">Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Ingrese el nombre del icono">
                    </div> 
                  </div>
                    
                  <!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" id="guardartipo" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar Sub-Lista</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="sublista">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="descripcion">Descripci&oacute;n</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripci&oacute;n">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="Ingrese la url">
                        </div>

                        <div class="form-group">
                          <label>Lista</label>
                          <div id="comblista"></div>
                        </div>
                        <div class="form-group">
                          <label>Tipo</label>
                            <select class='form-control' id='ilsttipo' name='tipo'>
                                <option>P&uacute;blica</option>
                                <option>Privada</option>
                            </select>
                        </div>
                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" id="guardarsublista" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Url's en lista blanca</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                                <th>Nro.</th>
                                <th>Descripci&oacute;n</th>
                                <th>URL</th>
                                <th>Tipo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="contlista"></tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        <!--/.col (right) -->
      </div>

    </section>
    <!-- /.content -->
