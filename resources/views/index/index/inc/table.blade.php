<table id="{{ $tableId }}" class="table">
    <thead>
        <tr>
            <th colspan="7"></th>
        </tr>
        <tr>
            <th scope="col">Seg Num.</th>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Age</th>
            <th scope="col">ClientID</th>
            <th scope="col">Age Category</th>
            <th scope="col">Secret Code</th>
        </tr>
    </thead>
    <tbody>
        @if($guests)
            @foreach($guests as $guest)
                <tr>
                    <td>{{ $guest->segN }}</td>
                    <td>{{ $guest->id }}</td>
                    <td>{{ $guest->type }}</td>
                    <td>{{ $guest->age }}</td>
                    <td>{{ $guest->clientId }}</td>
                    <td>{{ $guest->ageCategory }}</td>
                    <td>{{ $guest->secretCode }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
