{{--@if ($crud->hasAccess('promote'))--}}
<a href="{{ url($crud->route.'/'.$entry->getKey().'/generate') }}" class="btn btn-sm btn-link"><i class="la la-cc-paypal"></i> Generate </a>
{{--@endif--}}

@push('after_scripts')
{{--    @if(session()->has('message'))--}}
{{--        <script>--}}
{{--            new Noty({--}}
{{--                text: "{{ session()->get('message') }}",--}}
{{--                type: "success"--}}
{{--            }).show();--}}
{{--        </script>--}}
{{--    @endif--}}
@endpush
