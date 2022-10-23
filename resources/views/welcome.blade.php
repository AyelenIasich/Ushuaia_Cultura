<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Prueba</title>
</head>
<body>
    <h1>gacz</h1>



        <div class="container">
          <div class="row pt-4 pb-5">
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
              <form
                name="form"

                novalidate
                #f="ngForm"
              >
                <div class="row mt-1">
                  <div class="align-self-center mb-3 mt-2">
                    <h1 class="h4 title">Editar experiencia</h1>
                  </div>
                </div>
                <div class="form-group mb-3 mt-2">
                  <label class="mb-2" for="tituloTrab"
                    >Nombre del establecimiento</label
                  >
                  <input
                    placeholder="IPES Florentino Ameghino"
                    type="text"
                    class="form-control"
                    id="tituloTrab"
                    name="tituloTrab"

                    required
                    #tituloTrabInput="ngModel"

                  />

                </div>
                <div class="row">
                  <div class="col col-12 col-sm-6">
                    <div class="form-group mb-4">
                      <label class="mb-2" for="finTrab">Año de inicio</label>
                      <input
                        placeholder="2018"
                        type="number"
                        class="form-control"
                        id="finTrab"
                        name="finTrab"

                        required
                        #finTrabInput="ngModel"

                      />

                    </div>
                  </div>

                </div>

                <div class="form-group mb-4">
                  <label class="mb-2" for="descripcionTrab"
                    >Descripción del empleo</label
                  >

                  <textarea
                    placeholder="Clases de apoyo de inglés."
                    type="text"
                    class="form-control descripcionExp"
                    name="descripcionTrab"
                    id="descripcionTrab"
                    cols="30"
                    rows="4"

                    required
                    #descripcionTrabInput="ngModel"

                  ></textarea>

                </div>



                <div class="row justify-content-center align-items-center mb-3 pt-2">
                  <div class="col-6">
                    <a href="#experiencia" class="btn btn-outline-volver col-6">
                      <i class="fa-solid fa-angle-left"></i> Volver</a
                    >
                  </div>
                  <div class="col-6">
                    <button class="btn btn-outline-success col-6 pt-2">
                      <i class="fa-solid fa-pen-to-square"></i> Guardar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>
</html>

