<!-- Modal -->
<div class="modal fade" id="create_biolink_youtube" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Add a YouTube video </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <p class="text-muted modal-subheader mb-4 mt-4">Paste in your YouTube video URL and we will show it as a video on your profile.</p>
           <form name="create_biolink_youtube" method="post" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="request_type" value="create" />
            <input type="hidden" name="link_id" value="{{ $link->id }} " />
                    <input type="hidden" name="type" value="youtube" />

                    <div class="notification-container"></div>

                    <div class="form-group">
                        <label><i class="fa fa-fw fa-signature fa-sm mr-1"></i> YouTube Video URL</label>
                        <input type="text" class="form-control" name="location_url" required="required" placeholder="https://www.youtube.com/watch?v=2veyh2wunN" />
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

