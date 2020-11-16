@isset($consulta)
  <?php 
  $fecha = $consulta->c_fecha; 
  $hora = $consulta->c_Hora; ?>
@endisset
@empty($consulta)
  <?php 
    date_default_timezone_set('America/Costa_Rica');
    $fecha = Carbon\Carbon::now(); 
    $hora = Carbon\Carbon::now()->format('g:i A');
  ?>
@endempty

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_Fecha','Fecha de Consulta') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_Fecha') ? 'has-error' : "" }}">
      {{ Form::date('c_Fecha',$fecha, ['class'=>'form-control', 'id'=>'c_Fecha', 'placeholder'=>'YYYY-MM-DD']) }}
      {!! $errors->first('$hora', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    
    {!! form::label('c_Hora','Hora de Consulta') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_Hora') ? 'has-error' : "" }}">
      {{ Form::time('c_Hora', null, ['class'=>'form-control', 'id'=>'c_Hora', 'format'=>'g:i A']) }}
      {!! $errors->first('c_Hora', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_Acompanante','Nombre del Acompañante') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_Acompanante') ? 'has-error' : "" }}">
      {{ Form::text('c_Acompanante',NULL, ['class'=>'form-control', 'id'=>'c_Acompanante']) }}
      {!! $errors->first('c_Acompanante', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_motivo','Motivo de la Consulta') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_motivo') ? 'has-error' : "" }}">
      {{ Form::textArea('c_motivo',NULL, ['class'=>'form-control', 'id'=>'c_motivo']) }}
      {!! $errors->first('c_motivo', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_HistoriaPadecimientoAct','Historia de Padecimiento') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_HistoriaPadecimientoAct') ? 'has-error' : "" }}">
      {{ Form::textArea('c_HistoriaPadecimientoAct',NULL, ['class'=>'form-control', 'id'=>'c_HistoriaPadecimientoAct']) }}
      {!! $errors->first('c_HistoriaPadecimientoAct', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_tipo','Tipo de Examen') !!}
    @isset($consulta)
    <?php $tipo = $consulta->c_tipo; 
    ?>
    @endisset
    @empty($consulta)
    <?php $tipo = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_tipo') ? 'has-error' : "" }}">
      {{ Form::select('c_tipo', array('' => 'Seleccione una Opción','F' => 'Físico', 'G' => 'General', 'P' => 'Psíquico'),
            $tipo ,['class'=>'form-control', 'id'=>'c_tipo']) }}
      {!! $errors->first('c_tipo', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_Problemas','Problemas') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_Problemas') ? 'has-error' : "" }}">
      {{ Form::textArea('c_Problemas',NULL, ['class'=>'form-control', 'id'=>'c_Problemas']) }}
      {!! $errors->first('c_Problemas', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_sintomaPsiquico','Síntomas Psíquicos') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_sintomaPsiquico') ? 'has-error' : "" }}">
      {{ Form::textArea('c_sintomaPsiquico',NULL, ['class'=>'form-control', 'id'=>'c_sintomaPsiquico']) }}
      {!! $errors->first('c_sintomaPsiquico', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_Diagnostico','Diagnóstico') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_Diagnostico') ? 'has-error' : "" }}">
      {{ Form::textArea('c_Diagnostico',NULL, ['class'=>'form-control', 'id'=>'c_Diagnostico']) }}
      {!! $errors->first('c_Diagnostico', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_indicaciones','Indicaciones al Paciente') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_indicaciones') ? 'has-error' : "" }}">
      {{ Form::textArea('c_indicaciones',NULL, ['class'=>'form-control', 'id'=>'c_indicaciones']) }}
      {!! $errors->first('c_indicaciones', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('c_recomendaciones','Recomendación por parte del Médico') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('c_recomendaciones') ? 'has-error' : "" }}">
      {{ Form::textArea('c_recomendaciones',NULL, ['class'=>'form-control', 'id'=>'c_recomendaciones']) }}
      {!! $errors->first('c_recomendaciones', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>