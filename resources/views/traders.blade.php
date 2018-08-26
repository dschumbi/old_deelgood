
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit or Delete</th>
        </tr>
        </thead>
        <tbody id="traders-list" name="traders-list">
        @foreach ($user->traders as $trader)
            <tr id="trader{{$trader->id}}">
                <td>{{$trader->id}}</td>
                <td>{{$trader->name}}</td>
                <td>
                    <button class="btn btn-info open-modal" value="{{$trader->id}}">Edit
                    </button>
                    <button class="btn btn-danger delete-link" value="{{$trader->id}}">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="traderEditorModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="traderEditorModalLabel">Händler Editor</h4>
                </div>
                <div class="modal-body">
                    <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Name Ihres Ladengeschäfts" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Straße</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street" name="street"
                                       placeholder="Straße" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                    </button>
                    <input type="hidden" id="trader_id" name="trader_id" value="0">
                </div>
            </div>
        </div>
    </div>
