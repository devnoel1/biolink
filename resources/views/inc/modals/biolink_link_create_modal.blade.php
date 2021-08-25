<!-- Modal -->
<div class="modal fade" id="biolink_link_create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
           <div class="d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Add new block</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>

          <div class="row">
            @foreach ($biolink_blocks as $key => $value)
            <div class="col-12 col-lg-6">
              <button
                      type="button"
                      data-bs-toggle="modal"
                      data-bs-target="#create_biolink_{{ $key }}"
                      class="btn btn-block mb-3"
                      {{ $plan_settings->enabled_biolink_blocks->$key ? null : 'disabled="disabled"' }}
              >
                  <i class="fa fa-fw fa-circle fa-sm mr-1" style="color: {{ language()->link->biolink->$key->color }} "></i>

                  {{ language()->link->biolink->{$key}->name }}
              </button>
          </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
