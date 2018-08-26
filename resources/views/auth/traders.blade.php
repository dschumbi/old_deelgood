    <div class="card card-block">
            <h2 class="card-title">Laravel AJAX Examples
                <small>via jQuery .ajax()</small>
            </h2>
            <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Link</button>
        </div>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Straße</th>
            <th>Edit or Delete</th>
        </tr>
        </thead>
        <tbody id="traders-list" name="traders-list">
        @foreach ($user->traders as $trader)
            <tr id="trader{{$trader->id}}">
                <td>{{$trader->name}}</td>
                <td>{{$trader->street}}</td>
                <td>
                    <button class="btn btn-info open-modal" value="{{$trader->id}}">Bearbeiten
                    </button>
                    <button class="btn btn-danger delete-link" value="{{$trader->id}}">Löschen
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@include('auth.tradersModal')
