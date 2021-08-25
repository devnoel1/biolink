<div class="modal fade" id="create_biolink_mail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add a Sign up form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <p class="text-muted modal-subheader">Capture emails for Mailchimp or get the emails captured via Webhook.</p>

            <div class="modal-body">
                <form name="create_biolink_mail" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="request_type" value="create" />
                    <input type="hidden" name="link_id" value="{{ $link->id }} " />
                    <input type="hidden" name="type" value="mail" />


                    <div class="notification-container"></div>
                    <div class="form-group">
                        <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> Name</label>
                        <input type="text" name="name" class="form-control" required="required" />
                    </div>
                    <div class="text-center mt-4">
                        <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

