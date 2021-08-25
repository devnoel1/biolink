<!-- Modal -->
<div class="modal fade" id="create_biolink_link" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Create new link </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <p class="text-muted modal-subheader mb-2">Add a new link to you biolink page. More settings are available after the creation of the link.</p>
           <form name="create_biolink_link" method="post" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="request_type" value="create" />
            <input type="hidden" name="link_id" value="{{ $link->id }} " />
            <input type="hidden" name="type" value="link" />

            <div class="form-group">
                <label><i class="fa fa-fw fa-signature fa-sm mr-1"></i>  Destination URL</label>
                <input type="text" class="form-control" name="location_url" required="required" placeholder="https://domain.com/demo/url-demo" />
            </div>

            <div class="form-group">
                <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> Name</label>
                <input type="text" name="name" class="form-control" required="required" />
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

@section('script')

@endsection
