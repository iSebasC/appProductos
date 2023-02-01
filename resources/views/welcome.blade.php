<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        {{-- Font Awesone - Free --}}
        <script src="https://kit.fontawesome.com/6761239c74.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <h1 class="text-center p-3">Productos</h1>

        @if (session("correcto"))
          <div class="container">
            <div class="alert alert-success">{{session("correcto")}}</div>
          </div>
        @endif
        @if (session("incorrecto"))
          <div class="container">
            <div class="alert alert-danger">{{session("incorrecto")}}</div>
          </div>
        @endif

        <script>
          var res=function(){
            var not = confirm("¿Estas seguro de eliminar?");
            return not;
          }
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h5 class="modal-body text-center fs-5" id="exampleModalLabel">Añadir nuevo Producto</h5>
                </div>
                  <div class="modal-body">
                    <div class="container">
                     <div class="row">
                      <form action="{{route("crud.create")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Codigo del producto</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                        
        <div class="container p-5 table-responsive">
          
          <div class="p-2">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Producto</button>
          </div>

          <table class="table table-borderless table-bordered table-hover">
            <thead class="bg-emerald-300">
              <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRECIO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datos as $item)               
                <tr>
                  <th scope="row">{{$item->id_producto}}</th>
                  <td>{{$item->nombre}}</td>
                  <td> S/.{{$item->precio}}</td>
                  <td>{{$item->cantidad}}</td>
                  <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id_producto}}" class="btn btn-warning btn-sm text-white"><i class="fas fa-pen"></i></a>
                    <a href="{{route("crud.delete",$item->id_producto)}}" onclick="return res()" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></a>
                  </td>

                  <!-- Modal -->
                  <div class="modal fade" id="modalEditar{{$item->id_producto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-body text-center fs-5" id="exampleModalLabel">Modificar datos del Producto</h5>
                            </div>
                            <div class="modal-body">
                                 <div class="container">
                                    <div class="row">
                                      <form action="{{route("crud.update")}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Codigo del producto</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo" value="{{$item->id_producto}}" readonly>
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio" value="{{$item->precio}}">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad" value="{{$item->cantidad}}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>
                                      </form>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>  

        {{-- Script --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>
