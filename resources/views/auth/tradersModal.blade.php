 <div class="modal fade" id="traderEditorModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="traderEditorModalLabel">Händler Editor</h4>
            </div>
            <div class="modal-body">
                <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                    <div class="form-row">
                        <div class="col-sm-10">
                            <span class="input input--yoshiko">
                                <input type="text" class="input__field input__field--yoshiko" id="traderName" name="traderName" value="">
                                <label class="input__label input__label--yoshiko" for="traderName">
                                    <span class="input__label-content input__label-content--yoshiko" data-content="Name Ihres Ladengeschäfts">
                                        Name Ihres Ladengeschäfts
                                    </span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-10">
                            <span class="input input--yoshiko">
                                <input type="text" class="input__field input__field--yoshiko" id="traderStreet" name="traderStreet" value="">
                                <label class="input__label input__label--yoshiko" for="traderStreet">
                                    <span class="input__label-content input__label-content--yoshiko" data-content="Straße">
                                        Straße
                                    </span>
                                </label>
                            </span>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3">
                            <span class="input input--yoshiko">
                                <input type="text" class="input__field input__field--yoshiko" id="traderZip" name="traderZip" value="">
                                <label class="input__label input__label--yoshiko" for="traderZip">
                                    <span class="input__label-content input__label-content--yoshiko" data-content="PLZ">
                                        PLZ
                                    </span>
                                </label>
                            </span>

                        </div>
                        <div class="col-7">
                            <span class="input input--yoshiko">
                                <input type="text" class="input__field input__field--yoshiko" id="traderCity" name="traderCity" value="">
                                <label class="input__label input__label--yoshiko" for="traderCity">
                                    <span class="input__label-content input__label-content--yoshiko" data-content="Ort">
                                        Ort
                                    </span>
                                </label>
                            </span>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Speichern
                </button>
                <input type="hidden" id="trader_id" name="trader_id" value="{{$trader->id}}">
            </div>
        </div>
    </div>
</div>
