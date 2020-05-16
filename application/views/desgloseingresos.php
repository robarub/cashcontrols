<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/responsive.css">
  <title>System.....</title>
</head>

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
            <div class="col-sm-2">
              <button type="button" class="btn btn-gray-orange btn-block">Fecha especifica</button>
              <div class="input-group mt-2">
                <input type="date" class="form-control calendario">
              </div>
              <button class="button-save float-right px-3 mt-2" type="submit" name="button">Ir</button>
            </div>
            <div class="col-sm-3">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <button type="button" class="btn projections active">Periodo especifico</button>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="date" class="form-control calendario">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="date" class="form-control calendario">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="d-flex justify-content-center">
                <button type="button" class="btn projections active">Mes y Año</button>
              </div>
              <div class="row mt-2">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
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
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-block btn-grapic-income">Desglose de Ingresos</button>
              <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn value active">Productivos</button>
                <button type="button" class="btn value">No Productivos</button>
              </div>
              <div class="mt-4 d-flex justify-content-center mb-2">
                <button type="button" class="btn projections btn-gray-orange">Ver Detalle</button>
              </div>
              <div class="d-flex align-items-center mt-3">
                <button type="button" class="btn value text-uppercase mr-3">Valor</button>
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
          </div>
          <div class="row mt-3">
            <div class="col-9">
              <div id="graphic"></div>
            </div>
            <div class="col-3 align-self-center">
              <div class="terms">Terminos Consolidados</div>
              <div class="text-income mt-2 py-2">
                <div class="d-flex justify-content-between">
                  <span>Ingresos Productivos</span>
                  <span>65%</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Ingresos No Productivos</span>
                  <span>35%</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 offset-sm-1">
              <div class="mt-5">
                <button type="button" class="btn btn-primary btn-block value">Porcentaje</button>
                <button type="button" class="btn btn-primary btn-block value">Valor</button>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="wrapper-compare table-detail-graphic overflow-auto">
                <table class="table table-bordered table-sm" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">SIGLAS</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2020</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
                      <td></td>
                      <td></td>
                      <td>Accountant</td>
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

      <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-cartesian-3d.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-pie.min.js"></script>

      <script>
        anychart.onDocumentLoad(function () {
          // create an instance of a pie chart
          var data = [
            { x: "January", value: 10000, info: "INGRESOS PRODUCTIVOS" },
            { x: "February", value: 12000, info: "INGRESOS NO PRODUCTIVOS" }
          ];

          // create a 3d pie chart
          chart = anychart.pie3d(data);

          // set chart labels
          var labels = chart.labels();
          labels.enabled(true);
          labels.fontColor("white");
          labels.width(140);
          labels.hAlign("center");
          labels.position("inside");
          labels.useHtml(true);
          labels.format("<span style='text-decoration: underline;'>{%value}%<br><br></span>{%info}");


          // set the layout of the legend
          chart.legend().itemsLayout("vertical");

          // set the position of the legend
          chart.legend().position("right");

          // set the container id
          chart.container("graphic");

          // initiate drawing the chart
          chart.draw();
        });
      </script>
</body>

</html>