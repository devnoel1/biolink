
<div class="modal fade" id="link_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-fw fa-sm fa-trash-alt text-gray-700"></i>
                    <?= language()->link_delete_modal->header ?>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="<?= language()->global->close ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="link_delete" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" required="required" />
                    <input type="hidden" name="request_type" value="delete" />
                    <input type="hidden" name="link_id" value="" />

                    <div class="notification-container"></div>

                    <p class="text-muted"><?= language()->link_delete_modal->subheader ?></p>

                    <div class="mt-4">
                        <button type="submit" name="submit" class="btn btn-lg btn-block btn-danger"><?= language()->global->delete ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

