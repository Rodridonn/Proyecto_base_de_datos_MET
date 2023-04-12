@extends('layouts.panel')

  @section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  @endsection

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">MET-004 SLLP</h3>
            </div>
            
            <div class="row d-flex justify-content-between">
              <div class="col-lg-4 col-md-1 col-sm-5">
                
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card-body">
                  <a href="{{ url('/especialidades/create' )}}" class="btn btn-sm btn-primary btn-block flex-fill">Añadir nuevo registro</a>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title"> BUSQUEDA AVANZADA</h3>
                    <div class="card-tools">
                      
                        <form action="{{ url('/especialidades') }}" method="get">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12 d-lg-flex"> 
                                
                                <div style="width: 15%" class="input-group">
                                  <input type="date" name="fecha_inicio" placeholder="Buscar por fecha inicio" class="form-control"> 
                                </div>
                                <div style="width: 15%" class="input-group">
                                  <input type="date" name="fecha_fin" placeholder="Buscar por fecha final" class="form-control">
                                </div>
                                
                                <div class="input-group" style="width: 17%">
                                  <input type="number" name="dd_inicio" class="form-control" placeholder="Buscar por DD">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico inicial de DD aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                                <div class="input-group" style="width: 17%">
                                  <input type="number" name="dd_final" class="form-control" placeholder="Buscar por DD">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico final de DD aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
 

                                <div class="input-group" style="width: 18%">
                                  <input type="number" name="vvvv_inicio" class="form-control" placeholder="Buscar por VVVV">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico inicial de VVVV aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                                <div class="input-group" style="width: 18%">
                                  <input type="number" name="vvvv_final" class="form-control" placeholder="Buscar por VVVV">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor final numérico de VVVV aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                              </div>
                              
      
                              </div>
                            </div>
                          </div>

                          
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12 d-lg-flex">

                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="ww_inicio" class="form-control" placeholder="WW">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico inicial de WW aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="ww_final" class="form-control" placeholder="WW">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico final de WW aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>

                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="tt_inicio" class="form-control" placeholder="TT" step="0.1">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico inicial de TT aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="tt_final" class="form-control" placeholder="TT" step="0.1">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor final numérico de TT aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>

                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="tbh_inicio" class="form-control" placeholder="TBH" step="0.1">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico inicial de TBH aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>
                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="tbh_final" class="form-control" placeholder="TBH" step="0.1">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor final numérico de TBH aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>

                                <div class="input-group" style="width: 15%">
                                  <input type="text" name="cbtcu" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase(); maxlength="3" placeholder="CB/TCU">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" ><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>


                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="qfe" class="form-control" placeholder="QFE">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico QFE aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>

                                <div class="input-group" style="width: 15%">
                                  <input type="number" name="qnh" class="form-control" placeholder="QNH">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese el valor numérico QNH aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>


                                </div>
                                <div class="input-group" style="width: 20%">
                                  <input type="text" name="notas" class="form-control" placeholder="Buscar por notas"
                                  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                  <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="Ingrese alguan referencia aquí"><i class="fa fa-info-circle"></i></span>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>       

                          
                          <button type="submit" class="btn btn-warning" data-card-widget="collapse">Buscar</button>
                        </form> 

                        
                    </div>
              </div>
          </div>
    

        </div>
      </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">

                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card-body">   {{-- barra de notificacion que informa que fue creado o borrado un nuevo registro --}} 
            @if (session('notification'))
              <div class="alert alert-success" role="alert"> 
                {{session('notification')}}
              </div>
            @endif

        </div>
        
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="tablaespecial" class="table align-items-center table-flush">
            <thead class="thead-light">
            
              <tr>
                <th scope="col">id</th>
                <th scope="col">fecha</th>
                <th scope="col">gg</th>
                <th scope="col">oaci</th>
                <th scope="col">dd</th>
                <th scope="col">ff</th>
                <th scope="col">fmfm</th>
                <th scope="col">vvvv</th>
                <th scope="col">dv</th>
                <th scope="col">ww</th>
                <th scope="col">ww1</th>
                <th scope="col">www</th>
                <th scope="col">ns1</th>
                <th scope="col">hhh1</th>
                <th scope="col">cbtcu1</th>
                <th scope="col">ns2</th>
                <th scope="col">hhh2</th>
                <th scope="col">cbtcu2</th>
                <th scope="col">ns3</th>
                <th scope="col">hhh3</th>
                <th scope="col">cbtcu3</th>
                <th scope="col">ns4</th>
                <th scope="col">hhh4</th>
                <th scope="col">tt</th>
                <th scope="col">tbh</th>
                <th scope="col">td</th>
                <th scope="col">qfe</th>
                <th scope="col">qnh</th>
                <th scope="col">pulg_hg</th>
                <th scope="col">p_cord</th>
                <th scope="col">uuu</th>
                <th scope="col">notas</th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($specialities as $especialidad )
              <tr>
                <th scope="row">
                  {{$especialidad->id}}
                </th>

                <td>
                  {{$especialidad->fecha}}
                </td>
                
                <td>
                  {{$especialidad->gg}}
                </td>

                <th scope="row">
                  {{$especialidad->oaci}}
                </th>

                <td>
                  {{$especialidad->dd}}
                </td>

                <td>
                  {{$especialidad->ff}}
                </td>
                
                <td>
                  {{$especialidad->fmfm}}
                </td>
                
                <td>
                  {{$especialidad->vvvv}}
                </td>
                
                <td>
                  {{$especialidad->dv}}
                </td>
                
                <td>
                  {{$especialidad->ww}}
                </td>
                
                <td>
                  {{$especialidad->ww1}}
                </td>
                
                <td>
                  {{$especialidad->www}}
                </td>

                <td>
                  {{$especialidad->ns1}}
                </td>
                
                <td>
                  {{$especialidad->hhh1}}
                </td>
                
                <td>
                  {{$especialidad->cbtcu1}}
                </td>
                
                <td>
                  {{$especialidad->ns2}}
                </td>
                
                <td>
                  {{$especialidad->hhh2}}
                </td>
                
                <td>
                  {{$especialidad->cbtcu2}}
                </td>
                
                <td>
                  {{$especialidad->ns3}}
                </td>
                
                <td>
                  {{$especialidad->hhh3}}
                </td>
                
                <td>
                  {{$especialidad->cbtcu3}}
                </td>
                                
                <td>
                  {{$especialidad->ns4}}
                </td>
                                
                <td>
                  {{$especialidad->hhh4}}
                </td>
                                
                <td>
                  {{$especialidad->tt}}
                </td>

                <td>
                  {{$especialidad->tbh}}
                </td>
                                
                <td>
                  {{$especialidad->td}}
                </td>
                                
                <td>
                  {{$especialidad->qfe}}
                </td>

                                                
                <td>
                  {{$especialidad->qnh}}
                </td>

                                                
                <td>
                  {{$especialidad->pulg_hg}}
                </td>

                                                
                <td>
                  {{$especialidad->p_cord}}
                </td>

                                                
                <td>
                  {{$especialidad->uuu}}
                </td>
                                
                <td>
                  {{$especialidad->notas}}
                  
                </td>
                <td>
                  <form action="{{url('/especialidades/'.$especialidad->id)}}" method="POST">  {{-- botones de editar y eliminar --}} 
                    @csrf
                    @method('DELETE')
                    <a href="{{url('/especialidades/'.$especialidad->id. '/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
                  </form>

                </td>

              </tr>
              @endforeach              
            </tbody>
          </table>

          @section('js')

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
            <script>                  
              $(document).ready(function () {
                  $('#tablaespecial').DataTable();
              });
            </script>
          @endsection

        </div>
      </div>
@endsection