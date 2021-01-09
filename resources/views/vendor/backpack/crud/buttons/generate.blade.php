
@if ($crud->hasAccess('update'))

    <a href="{{ url($crud->route.'/'.$entry->getKey().'/generate') }}" class="btn btn-sm btn-link" ><i class="la la-credit-card"></i> Generate</a>
@endif


