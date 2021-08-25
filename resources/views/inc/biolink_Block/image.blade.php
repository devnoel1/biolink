<!-- Modal -->
<div class="modal fade" id="create_biolink_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Create an Image Block </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>

           <form name="create_biolink_image" method="post" role="form" class="mt-5">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="request_type" value="create" />
            <input type="hidden" name="link_id" value="{{ $link->id }} " />
            <input type="hidden" name="type" value="image" />
            <div class="form-group mb-3">
                <label><i class="fa fa-fw fa-image fa-sm mr-1"></i> Image</label>
                <input type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file" required="required" />
            </div>

            <div class="form-group mb-3">
                <label><i class="fa fa-fw fa-link fa-sm mr-1"></i> Destination URL</label>
                <input type="text" class="form-control" name="location_url" />
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

