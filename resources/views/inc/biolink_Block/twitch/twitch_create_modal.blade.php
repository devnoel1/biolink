<div class="modal fade" id="create_biolink_twitch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add a Twitch video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <p class="text-muted modal-subheader">Paste in your Twitch URL and we will show it as a video on your profile.</p>

            <div class="modal-body">
                <form name="create_biolink_twitch" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="request_type" value="create" />
                    <input type="hidden" name="link_id" value="{{ $link->id }} " />
                    <input type="hidden" name="type" value="twitch" />

                    <div class="notification-container"></div>

                    <div class="form-group">
                        <label><i class="fa fa-fw fa-signature fa-sm mr-1"></i> Twitch URL</label>
                        <input type="text" class="form-control" name="location_url" required="required" placeholder="" />
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


