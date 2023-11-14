

<div class="modal" id="linkChoose" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#linkChoose').hide();"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="target" value=""/>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Link Typ</label>
                            <select id="chooseType" class="form-control">
                                <option value="-">Bitte wählen</option>
                                <option value="page">Seite</option>
                                <option value="section">Sektion auf aktueller Seite</option>
                                <option value="manual">Manuell</option>
                        </div>
                    </div>
                    <div id="linkTypePage" class="col-12"></div>
                    <div id="linkTypeSection" class="col-12"></div>
                    <div id="linkTypeManual" class="col-12"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#linkChoose').hide();">Close</button>
            </div>
        </div>
    </div>
</div>
