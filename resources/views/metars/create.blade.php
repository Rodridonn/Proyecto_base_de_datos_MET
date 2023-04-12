@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">METAR </h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/metar')}}" class="btn btn-sm btn-success">Regresar
                <i class="fas fa-chevron-left"></i>
            </a>
            </div>
          </div>
        </div>

        <div class="card-body">   {{-- barra de notificacion que informa que fue creado o borrado un nuevo registro --}} 
           
            @if ($errors->any())
                @foreach ( $errors->all() as $error )
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong></strong>{{$error}}
                    </div>

                @endforeach
            
            @endif

        <div class="card-body">
            <form action="{{url ('/metar')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fecha_metar" class="form-control-label">FECHA: </label>
                    <input class="form-control form-control-sm" type="date" id="fecha_metar" name="fecha_metar" value="{{old('fecha_metar')}}" required >
                </div>
    
                <div class="form-group">
                  <label for="hora" class="form-control-label">HORA.: </label>
                  <input class="form-control form-control-sm" type="time" id="hora"  name="hora" value="{{old('hora')}}" required>
                </div>
    
                <div class="form-group">
                  <label for="metar" class="form-control-label">METAR/SPECI</label>
                  <select class="form-control form-control-sm" id="metar" name="metar" value="{{old('metar')}}" required>
                      <option value="-"></option>
                      <option value="METAR">METAR</option>
                      <option value="SPECI">SPECI</option>
                  </select>
                  
                </div>
    
                <div class="form-group">
                  <label for="oaci_metar" class="form-control-label">Sigla OACI </label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="oaci_metar" name="oaci_metar" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('oaci_metar')}}" required>
                </div>

                <div class="form-group">
                  <label for="horario" class="form-control-label">Horario </label>
                  <input class="form-control form-control-sm" type="text" maxlength="7" id="horario" name="horario" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('horario')}}" >
                </div>
    
                <div class="form-group">
                  <label for="viento" class="form-control-label">VIENTO</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="viento" name="viento" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('viento')}}" >
                </div>
    
                <div class="form-group">
                  <label for="visibilidad" class="form-control-label">VISIBILIDAD</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="visibilidad" name="visibilidad" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('visibilidad')}}" >
                </div>
    
                <div class="form-group">
                  <label for="tiempo_presente_1" class="form-control-label">TIEMPO PRESENTE 1</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="tiempo_presente_1" name="tiempo_presente_1" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('tiempo_presente_1')}}" >
                </div>
    
                <div class="form-group">
                  <label for="tiempo_presente_2" class="form-control-label">TIEMPO PRESENTE 2</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="tiempo_presente_2" name="tiempo_presente_2" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('tiempo_presente_2')}}" >
                </div>
    
                <div class="form-group">
                  <label for="tiempo_presente_3" class="form-control-label">TIEMPO PRESENTE 3</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" tiempo_presente_3 name="tiempo_presente_3" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('tiempo_presente_3')}}" >
                </div>
    
                <div class="form-group">
                  <label for="nubosidad_1" class="form-control-label">NUBOSIDAD 1</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="nubosidad_1" name="nubosidad_1" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('nubosidad_1')}}" >
                </div>
    
                <div class="form-group">
                  <label for="nubosidad_2" class="form-control-label">NUBOSIDAD 2</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="nubosidad_2" name="nubosidad_2" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('nubosidad_2')}}" >
                </div>
    
                <div class="form-group">
                  <label for="nubosidad_3" class="form-control-label">NUBOSIDAD 3</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="nubosidad_3" name="nubosidad_3" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('nubosidad_3')}}" >
                </div>
    
                <div class="form-group">
                  <label for="nubosidad_4" class="form-control-label">NUBOSIDAD 4</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="nubosidad_4" name="nubosidad_4" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('nubosidad_4')}}" >
                </div>
    
                <div class="form-group">
                  <label for="temperatura" class="form-control-label">TEMPERATURA</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="temperatura" name="temperatura" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('temperatura')}}" >
                </div>
    
                <div class="form-group">
                  <label for="qnh_hpa" class="form-control-label">QNH hpa</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="qnh_hpa" name="qnh_hpa" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('qnh_hpa')}}" >
                </div>
    
                <div class="form-group">
                  <label for="qnh_pulg_hg" class="form-control-label">QNH pulg_hg</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="qnh_pulg_hg" name="qnh_pulg_hg" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('qnh_pulg_hg')}}" >
                </div>
    
                <div class="form-group">
                  <label for="qfe" class="form-control-label">QFE</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="qfe" name="qfe" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('qfe')}}" >
                </div>
                
                <div class="form-group">
                  <label for="h_relativa" class="form-control-label">HUMEDAD RELATIVA</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="h_relativa" name="h_relativa" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('h_relativa')}}" >
                </div>

                <div class="form-group">
                  <label for="p_cord" class="form-control-label">P. CORDILLERA</label>
                  <input class="form-control form-control-sm" type="text" maxlength="4" id="p_cord" name="p_cord" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('p_cord')}}" >
                </div>

                <div class="form-group">
                  <label for="notas_metar" class="form-control-label">NOTAS</label>
                  <input class="form-control form-control-sm" type="text" maxlength="200" id="notas_metar" name="notas_metar" 
                      style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('notas_metar')}}" >
                </div> 
                
                <div>
                  <button type="submit" class="btn btn-sm btn-primary" tabindex="22"> Crear registro</button>
                </div>
                


            </form>

        </div>
        

      </div>

@endsection
