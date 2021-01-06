
@if ($crud->hasAccess('update'))

    @php
        $student = App\Models\Fee::where('id', $entry->getKey())->first();
    @endphp

    <a href="{{ url($crud->route.'/'.$entry->getKey().'/invoice') }}" class="btn btn-sm btn-link" @if($student->paymentStatus == 'pending') style=" display:none;" @endif ><i class="la la-credit-card"></i> Invoice</a>
@endif
