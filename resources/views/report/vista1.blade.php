<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
      .master
      {
          width: 100%;
          margin: 0px auto;
      }

      th
      {
          text-align: center;
          vertical-align: middle;
          border: 1px solid #006ac1;
          background-color: #00AEEF;
          color: #ffffff;
      }
  </style>
  <body>
      <h1>Reportes por mes de los permisos aceptados</h1>
    @foreach($lista_pdf as $c)
      {{$c[0]->rut}} {{$c[0]->user->name}} {{$c[0]->user->apellido}}
     <table class="table">
        <thead>
            <tr>
                <th>Detalle</th>
                <th>Reemplazo</th>
                <th>Fechas</th>
                <th align="center" >Cantidad dias solicitados</th>
                <th align="center">Cant.Sin goce de sueldo</th>
            </tr>
        </thead>

        <tbody>
          @foreach($c as $a)
                  <tr>
                  <td> {{$a->detalle}}</td>
                  <td> {{$a->reemplazo}}</td>
                  <td> {{$a->fecha_desde}} - {{$a->fecha_hasta}}</td>
                  <td align="center"> {{$a->cantidad_dias}}</td>
                  <td align="center">{{$a->ss}}</td>
                </tr>
          @endforeach
        </tbody>
    </table>
  @endforeach


  </body>
</html>
