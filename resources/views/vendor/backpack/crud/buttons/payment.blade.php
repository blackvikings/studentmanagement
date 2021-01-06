@if ($crud->hasAccess('update'))

    @php
            $student = App\Models\Fee::where('id', $entry->getKey())->first();
    @endphp

    <a href="{{ url($crud->route.'/'.$entry->getKey().'/payment') }}" class="btn btn-sm btn-link" @if($student->paymentStatus == 'paid') style="display: none;" @endif><i class="la la-cc-paypal"></i> Pay </a>
@endif
