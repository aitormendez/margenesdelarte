@if (is_tax())
  <div class="page-header centrar-container">
    <div class="centrar">
      <h1>{!! App::title() !!}</h1>
      @if (is_tax('origin'))
          {!! term_description() !!}
      @endif
    </div>
  </div>
@else
  <div class="page-header">
    <h1>{!! App::title() !!}</h1>
    @if (is_tax('origin'))
        {!! term_description() !!}
    @endif
  </div>

@endif
