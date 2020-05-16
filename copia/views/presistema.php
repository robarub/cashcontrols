<?php require_once 'complementos/head.php'; ?>


<body>
  <div class="system-page admin presystem">
    <div class="container-fluid">
      <div class="row nav_bar_system">
        <div class="col-sm-3 d-flex">
          <h3>System.....</h3>
          <div class="logo ml-auto">
            <img src="assets/img/icon-menu.png" class="img-fluid" alt="Icon menú">
          </div>
        </div>
        <div class="col-sm-9 d-flex">
          <h1 class="name">....cash controls....</h1>
          <div class="user-content ml-auto">
            <div>
              <p class="mb-0 title-user">Administrador</p>
              <p class="mb-0 user-name">Usuario</p>
            </div>
            <img src="assets/img/admin-user.png" class="img-fluid" alt="logo">
            <button type="button" name="button">
              <img src="assets/img/menu-arrow.png" class="img-fluid" alt="flecha">
            </button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 menu_lateral admin">
          <h4 class="p-2">Módulos</h4>
          <div class="subtitle d-flex align-items-center">
            <i class="arrow-left"></i>
            <h5 class="pt-2 px-2">Agregar</h5>
            <i class="arrow-right"></i>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Cuentas Generales y Tipo de tarjeta</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet5"></i>
            <span>Tipos de Conceptos y Categorias</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet6"></i>
            <span>Actividades Clasificadas</span>
          </div>
          <div class="subtitle d-flex align-items-center">
            <i class="arrow-left"></i>
            <h5 class="pt-2 px-2">Reporte por validar</h5>
            <i class="arrow-right"></i>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Vs lo real</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet5"></i>
            <span>Vs Saldos</span>
          </div>
          <div class="subtitle d-flex align-items-center mt-4">
            <i class="arrow-left"></i>
            <h5 class="pt-2 px-2">Captura</h5>
            <i class="arrow-right"></i>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Proyecciones</span>
          </div>
          <div class="subtitle d-flex align-items-center mt-4">
            <i class="arrow-left"></i>
            <h5 class="pt-2 px-2">Ver</h5>
            <i class="arrow-right"></i>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Vs lo Real</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Vs Saldos</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Ver Detalle</span>
          </div>
          <div class="subtitle d-flex align-items-center">
            <i class="arrow-left"></i>
            <h5 class="pt-2 px-2">Gráficas por tipo de</h5>
            <i class="arrow-right"></i>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet4"></i>
            <span>Ingresos vs Egresos</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet5"></i>
            <span>Ing.Productivos Vs Ing.No Productivos</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet6"></i>
            <span>Desglose de Ingresos</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet6"></i>
            <span>Eg. Gasto Vs Eg. Inversión</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet6"></i>
            <span>Desglose de Egresos</span>
          </div>
        </div>
        <div class="col-sm-9 mt-4 presystem">
          <div class="row">
            <div class="col-sm-3">
              <p class="title text-center">siglas generales</p>
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <button class="button-entry" type="button" name="button">Ingresos</button>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <button class="button-egress" name="button">Egresos</button>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6 d-flex justify-content-center flex-column">
                  <small class="text-center">Clasifica</small>
                  <button class="button-entry describe text-uppercase prod" type="button" name="button">PRODUCTIVOS</button>
                  <button class="button-egress describe text-uppercase mt-1 prod" type="button" name="button">NO PRODUCTIVOS</button>
                </div>
              </div>
              <div class="form-group mb-2 mt-3">
                <label class="mb-0 pl-2"><small>Incluye las siglas</small></label>
                <input type="text" class="form-control">
              </div>
              <div class="text-right">
                <button class="button-egress describe" type="button" name="button">Describir</button>
              </div>
              <div class="form-group mb-2 mt-3">
                <label class="mb-0 pl-2"><small>Escriba nombre completo de (siglas)</small></label>
                <input type="text" class="form-control">
              </div>
              <div class="text-right">
                <button class="button-save" type="button" name="button">Guardar</button>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="title mt-md-0 mt-4 text-center">siglas por ingresos</p>
              <div class="table-striped-system">
                <table class="table table-striped table-sm presystem">
                  <tbody class="text-uppercase">
                    <tr>
                      <th scope="row">sdo</th>
                    </tr>
                    <tr>
                      <th scope="row">dtn</th>
                    </tr>
                    <tr>
                      <th scope="row">fcar</th>
                    </tr>
                    <tr>
                      <th scope="row">ftol</th>
                    </tr>
                    <tr>
                      <th scope="row">fmor</th>
                    </tr>
                    <tr>
                      <th scope="row">bo</th>
                    </tr>
                    <tr>
                      <th scope="row">f axpa</th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="title mt-md-0 mt-4 text-center">siglas por egresos</p>
              <div class="table-striped-system">
                <table class="table table-striped table-sm presystem">
                  <tbody class="text-uppercase">
                    <tr>
                      <th scope="row">fijo</th>
                    </tr>
                    <tr>
                      <th scope="row">var</th>
                    </tr>
                    <tr>
                      <th scope="row">extra</th>
                    </tr>
                    <tr>
                      <th scope="row">viaje</th>
                    </tr>
                    <tr>
                      <th scope="row">arre</th>
                    </tr>
                    <tr>
                      <th scope="row">segu</th>
                    </tr>
                    <tr>
                      <th scope="row">mars</th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-2">
                <label class="mb-0 pl-2"><small>Buscar concepto en específico</small></label>
                <div class="custom-select-system text-uppercase">
                  <select>
                    <option value="0"></option>
                    <option value="P">personal</option>
                    <option value="F">familiar</option>
                    <option value="I">inmuebles</option>
                    <option value="V">vehiculos</option>
                    <option value="E">empresarial</option>
                    <option value="T">tranf ctas propias</option>
                  </select>
                </div>
              </div>
              <div>
                <small class="d-block pl-4">Clasifica</small>
                <button class="button-entry describe mr-2" type="button" name="button">FIJOS</button>
                <button class="button-egress describe" type="button" name="button">VARIABLES</button>
                <button class="button-olive float-right" type="button" name="button">Validar</button>
              </div>
              <div class="associate d-flex mt-3">
                <div>
                  <small>Después</small>
                  <button class="button-olive" type="button" name="button">Asociar</button>
                </div>
                <div>
                  <small>Finalmente</small>
                  <button class="button-entry describe" type="button" name="button">Agrupar a Categoría</button>
                </div>
              </div>
              <div class="form-group mb-2 mt-4">
                <label class="mb-0 pl-2"><small>Asociar a un Grupo General</small></label>
                <div class="custom-select-system text-uppercase">
                  <select>
                    <option value="0"></option>
                    <option value="P">personal</option>
                    <option value="F">familiar</option>
                    <option value="I">inmuebles</option>
                    <option value="V">vehiculos</option>
                    <option value="E">empresarial</option>
                    <option value="T">tranf ctas propias</option>
                  </select>
                </div>
              </div>
              <button class="button-olive float-right" type="button" name="button">Validar</button>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-sm-3">
              <p class="title text-center text-uppercase">grupos generales</p>
              <div class="form-group mb-2 mt-3">
                <label class="mb-0 pl-2"><small>Agrega el grupo a asociar</small></label>
                <input type="text" class="form-control">
              </div>
              <div class="text-right">
                <button class="button-save" type="button" name="button">Guardar</button>
              </div>
              <p class="mt-5 title text-center text-uppercase">conceptos específicos</p>
              <div class="form-group mb-2 mt-3">
                <label class="mb-0 pl-2"><small>Agrega el concepto a asociar</small></label>
                <input type="text" class="form-control">
              </div>
              <div class="text-right">
                <button class="button-save" type="button" name="button">Guardar</button>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="title mt-md-0 mt-4 text-center">grupos generales</p>
              <div class="table-striped-system">
                <table class="table table-striped table-sm presystem">
                  <tbody class="text-uppercase">
                    <tr>
                      <th scope="row">casa</th>
                    </tr>
                    <tr>
                      <th scope="row">colegios</th>
                    </tr>
                    <tr>
                      <th scope="row">autos/ten/mtto</th>
                    </tr>
                    <tr>
                      <th scope="row">familia</th>
                    </tr>
                    <tr>
                      <th scope="row">ranccho</th>
                    </tr>
                    <tr>
                      <th scope="row">seguros</th>
                    </tr>
                    <tr>
                      <th scope="row">arrendamientos</th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="title mt-md-0 mt-4 text-center">conceptos específicos</p>
              <div class="table-striped-system">
                <table class="table table-striped table-sm presystem">
                  <tbody>
                    <tr>
                      <th scope="row">Carla</th>
                    </tr>
                    <tr>
                      <th scope="row">Carla TC</th>
                    </tr>
                    <tr>
                      <th scope="row">CMM</th>
                    </tr>
                    <tr>
                      <th scope="row">Jeremias</th>
                    </tr>
                    <tr>
                      <th scope="row">Otros</th>
                    </tr>
                    <tr>
                      <th scope="row">Colonos LCC</th>
                    </tr>
                    <tr>
                      <th scope="row">BMM</th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group mb-2">
                <label class="mb-0 pl-2"><small>Selecciona una categoría.</small></label>
                <div class="custom-select-system text-uppercase">
                  <select>
                    <option value="0"></option>
                    <option value="P">personal</option>
                    <option value="F">familiar</option>
                    <option value="I">inmuebles</option>
                    <option value="V">vehiculos</option>
                    <option value="E">empresarial</option>
                    <option value="T">tranf ctas propias</option>
                  </select>
                </div>
              </div>
              <div class="text-right">
                <button class="button-save" type="button" name="button">Guardar</button>
              </div>
            </div>
          </div>
          <div class="row mt-4 mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
              <div class="date">
                <small class="d-block">Fecha de registro</small>
                <input type="text" class="date-actual" name="date-actual" id="name-actual" value="07 de Marzo 2020" readonly>
              </div>
              <div>
                <button class="button-save" type="button" name="button">Guardar todo</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
