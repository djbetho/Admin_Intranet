<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <td>Rut</td>
          <td>Nombre</td>
          <td>Correo</td>

          <td>Direccion</td>
          <td>telefono</td>
        </tr>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->rut }}</td>
              <td>{{ $user->name }} {{ $user->apellido }}</td>
              <td>{{ $user->email }}</td>
             
              <td>{{ $user->direccion }}</td>
              <td>{{ $user->telefono }}</td>
            </tr>
          @endforeach
        </tbody>
      </thead>
    </table>
  </body>
</html>
