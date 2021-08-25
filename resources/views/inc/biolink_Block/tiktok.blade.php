<!-- Modal -->
<div class="modal fade" id="create_biolink_tiktok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Add a Tiktok Video </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <p class="text-muted modal-subheader">Paste in your TikTok Video URL and we will show it as a video on your profile.</p>
           <form name="create_biolink_tiktok" method="post" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="request_type" value="create" />
            <input type="hidden" name="link_id" value="{{ $link->id }} " />
            <input type="hidden" name="type" value="tiktok" />
            <div class="notification-container"></div>
            <div class="form-group">
                <label><i class="fa fa-fw fa-signature fa-sm mr-1"></i> TikTok Video URL</label>
                <input type="text" class="form-control" name="location_url" required="required" placeholder="https://www.tiktok.com/@rynl/video/123733773" />
            </div>

            <div class="text-center mt-4">
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
            </div>
           </form>
        </div>
      </div>
    </div>
  </div>

