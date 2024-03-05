<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">Contacts</h1>
        <a href="{{ route('create') }}" class="btn btn-primary btn-add">Add Contact <i class="fas fa-plus"></i></a>
        <form id="searchForm" action="{{ route('search') }}" method="GET">
            <input type="text" name="query" id="query" placeholder="Cari kontak...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>
                            <a href="{{ route('edit', $contact->id) }}" class="btn btn-primary btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                                <form action="{{ route('destroy', $contact->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Anda yakin ingin menghapus data {{ $contact->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#searchForm').on('submit', function (e) {
            e.preventDefault();
            var query = $('#query').val();
            $.ajax({
                type: 'GET',
                url: '{{ route('search') }}',
                data: {query: query},
                success: function (data) {
                    $('#contactsTable tbody').html(data);
                }
            });
        });
    });
</script>

