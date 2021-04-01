editar

<form action="{{url('/alumnos/'.$alumno->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="stud_name" id="stud_name" value="{{$alumno->stud_name}}">
    <br>
    <label for="Apellidos">{{'Apellidos'}}</label>
    <input type="text" name="stud_lastname" id="stud_lastname" value="{{$alumno->stud_lastname}}">
    <br>
    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="stud_email" id="stud_email" value="{{$alumno->stud_email}}">
    <br>
    <label for="Telefono">{{'Telefono'}}</label>
    <input type="text" name="stud_phone" id="stud_phone" value="{{$alumno->stud_phone}}">
    <br>
    <label for="Genero">{{'Genero'}}</label>
    <input type="text" name="stud_genero" id="stud_genero" value="{{$alumno->stud_genero}}">
    <br>
    <label for="Edad">{{'Edad'}}</label>
    <input type="text" name="stud_edad" id="stud_edad" value="{{$alumno->stud_edad}}">
    <br>
    <label for="Foto">Foto</label>
    <img src="{{ asset('storage').'/'.$alumno->stud_picture}}" alt="" width="200">
    <br>
    <label for="Foto">{{'Imagen'}}</label>
    <input type="file" name="stud_picture" id="stud_picture" value="{{$alumno->stud_picture}}">
    <br> 

    <input type="submit" value="Actualizar">

    <a href="{{ url('alumnos') }}">Regresar</a> 

</form>