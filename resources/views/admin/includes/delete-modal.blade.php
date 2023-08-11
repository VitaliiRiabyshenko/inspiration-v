<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    @csrf
    @method('delete')
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Ви точно хочете видалити цей запис?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Видалити</button>
                </div>
            </div>
        </div>
    </div>
</form>