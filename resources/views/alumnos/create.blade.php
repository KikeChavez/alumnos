Crear

<form action="{{url('/alumnos')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="stud_name" id="stud_name" value="">
    <br>
    <label for="Apellidos">{{'Apellidos'}}</label>
    <input type="text" name="stud_lastname" id="stud_lastname" value="">
    <br>
    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="stud_email" id="stud_email" value="">
    <br>
    <label for="Telefono">{{'Telefono'}}</label>
    <input type="text" name="stud_phone" id="stud_phone" value="">
    <br>
    <label for="Genero">{{'Genero'}}</label>
    <input type="text" name="stud_genero" id="stud_genero" value="">
    <br>
    <label for="Edad">{{'Edad'}}</label>
    <input type="text" name="stud_edad" id="stud_edad" value="">
    <br>
    <label for="Foto">{{'Imagen'}}</label>
    <input type="file" name="stud_picture" id="stud_picture" value="">
    <br> 

    <a href="{{ url('alumnos') }}">Regresar</a>

    <input type="submit" value="Agregar">

</form>