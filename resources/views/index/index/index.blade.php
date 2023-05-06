
@extends('layouts.index')

@section('content')

<div>
    <h1>List of guests</h1>
    <br>
        <div>
            @include('index.index.inc.table', [
                'guests' => $guests,
                'tableId' => 'table-blade',
                'tableTitle' => 'Guests which rendered by blade'])
        </div>
    <br>
        <div>
            @include('index.index.inc.table', [
                'guests' => null,
                'tableId' => 'table-jquery',
                'tableTitle' => 'Guests which rendered by jquery'])
        </div>
    <br>
        <div>
            @include('index.index.inc.form', ['guests' => $guests])
        </div>
    <br>
</div>

@endsection

@push('script')
    <script type="text/javascript">

        $(function() {

            var guests = {!! json_encode($guests) !!};

            inputDataToGuestTable(guests);
        });

        function inputDataToGuestTable(guests)
        {
            $.each(guests, function(key, guest) {

                let row = prepareRowForGuestTable(guest);

                $('#table-jquery tbody').append(row);
            });
        }

        function prepareRowForGuestTable(guest)
        {
            let html = `<tr>
                    <td>${guest.segN}</td>
                    <td>${guest.id}</td>
                    <td>${guest.type}</td>
                    <td>${guest.age}</td>
                    <td>${guest.clientId}</td>
                    <td>${guest.ageCategory}</td>
                    <td>${guest.secretCode}</td>
                </tr>`;

            return html;
        }

    </script>
@endpush
