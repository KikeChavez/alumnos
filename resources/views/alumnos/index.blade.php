Ver datos

<a href="{{ url('alumnos/create') }}">Agregar alumno</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Genero</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($alumnos as $alumno)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$alumno->stud_picture}}" alt="" width="200">
            
            </td>
            <td>{{$alumno->stud_name}}</td>
            <td>{{$alumno->stud_lastname}}</td>
            <td>{{$alumno->stud_email}}</td>
            <td>{{$alumno->stud_phone}}</td>
            <td>{{$alumno->stud_genero}}</td>
            <td>{{$alumno->stud_edad}}</td>
            <td>

            <a href="{{url('/alumnos/'.$alumno->id.'/edit')}}">
                Editar
            </a>
                
            | 

                <form action="{{ url ('/alumnos/'.$alumno->id)}}" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>