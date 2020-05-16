<?php require_once 'complementos/head.php'; ?>


<body>
  <div class="system-page admin">
    <div class="container-fluid">
      <div class="row nav_bar_system">
        <div class="col-sm-3 d-flex">
          <h3>System.....</h3>
          <div class="logo ml-auto">
            <img src="assets/img/icon-menu.png" class="img-fluid" alt="Icon menú">
          </div>
        </div>
        <div class="col-sm-9 d-flex">
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
            <span>Diario</span>
          </div>
          <div class="concept my-2">
            <i class="ml-4 icon bullet5"></i>
            <span>Mensual</span>
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
        <div class="col-sm-9 mt-4 admin">
          <div class="row">
            <div class="col-sm-4 col-12">
              <div class="buttons">
                <button type="button" class="btn projections active text-uppercase">Proyecciones</button>
                <button type="button" class="btn real">vs lo REAL</button>
                <button type="button" class="btn balances">vs SALDOS</button>
              </div>
              <div class="row">
                <div class="col-12 save-edit mt-2">
                  <button class="button-save active" type="button" name="edit">Editar</button>
                  <button class="button-save ml-4" type="button" name="save">Guardar</button>
                </div>
              </div>
            </div>
            <div class="col-sm-5 pl-0 col-12 cat-detail">
              <div class="select-category float-left">
                <label class="category-label position-absolute text-center">Elige una categoría</label>
                <div class="group-checks">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="P" value="P">
                    <label class="form-check-label position-absolute" for="P">P</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="F" value="F">
                    <label class="form-check-label position-absolute" for="F">F</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="I" value="I">
                    <label class="form-check-label position-absolute" for="I">I</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="V" value="V">
                    <label class="form-check-label position-absolute" for="V">V</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="E" value="E">
                    <label class="form-check-label position-absolute" for="E">E</label>
                  </div>
                </div>
              </div>
              <div class="detail position-absolute">
                <button type="button" class="btn btn-primary btn-detail">Ver detalle</button>
                <div class="form-group d-inline-block admin">
                  <div class="custom-select-system">
                    <select>
                      <option value="0">Elige año:</option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>
                <div class="form-group d-inline-block admin">
                  <div class="custom-select-system">
                    <select>
                      <option value="0">Elige un mes:</option>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-12">
              <div class="row period">
                <div class="col-6">
                  <div class="input-group">
                    <input type="date" class="form-control calendario">
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <input type="date" class="form-control calendario">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12 value-thousands">
              <button type="button" class="btn btn-primary value text-uppercase mr-3">Valor</button>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="value" id="thousands" checked="checked">
                <label class="form-check-label" for="thousands">Con miles</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="value" id="whitout-thousands">
                <label class="form-check-label" for="whitout-thousands">Sin miles</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button class="button-save float-right px-3 py-1" type="submit" name="button">Ir</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="wrapper-compare mt-4">
                <table id="compare" class="table table-bordered table-sm" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th scope="col">AÑO</th>
                      <th scope="col">Día</th>
                      <th scope="col">Mes/Concepto</th>
                      <th scope="col">
                        <div>
                          <span>Last name</span>
                          <small>P</small>
                        </div>
                      </th>
                      <th scope="col">
                        <div>
                          <span>Position</span>
                          <small>R</small>
                        </div>
                      </th>
                      <th scope="col">
                        <div>
                          <span>Phone</span>
                          <small>S</small>
                        </div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>63</td>
                      <td>2011/07/25</td>
                    </tr>
                    <tr>
                      <td>2020</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>66</td>
                      <td>2009/01/12</td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>22</td>
                      <td>2012/03/29</td>
                    </tr>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>61</td>
                      <td>2011/04/25</td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>63</td>
                      <td>2011/07/25</td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>66</td>
                      <td>2009/01/12</td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>22</td>
                      <td>2012/03/29</td>
                    </tr>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>61</td>
                      <td>2011/04/25</td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>63</td>
                      <td>2011/07/25</td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>66</td>
                      <td>2009/01/12</td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>22</td>
                      <td>2012/03/29</td>
                    </tr>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>61</td>
                      <td>2011/04/25</td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>63</td>
                      <td>2011/07/25</td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>66</td>
                      <td>2009/01/12</td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>
                        <input type="text" value="lento">
                      </td>
                      <td>22</td>
                      <td>2012/03/29</td>
                    </tr>
                  </tbody>
                </table>
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
