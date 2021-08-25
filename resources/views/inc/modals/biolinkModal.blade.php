<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Create Biolink Page</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>

           <form action="" method="POST">
               @csrf
               <label for="" class="mt-3"><i class="bx bx-link"></i> Biolink URL</label>
               <input type="hidden" name="type" id="type" value="biolink">
               <div class="input-group">
                <span class="input-group-text" id="basic-addon3">{{ url('') }}/</span>
                <input type="text" class="form-control" id="url" name="url" aria-describedby="basic-addon3" placeholder="your-custom-alias">
              </div>
              <div> <small class="form-text text-muted">Leave empty for a random generated one.</small></div>
              <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary btn-block" id="create_biolink">Create Biolink Page</button>
              </div>
           </form>
        </div>
      </div>
    </div>
  </div>
