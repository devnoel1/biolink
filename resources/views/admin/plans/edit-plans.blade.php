@extends('layouts.admin-layout')

@section('styles')
<style>
    label{
        font-weight: 800
    }
    .form-group, .form-check{
        margin-bottom: 2%;
    }
</style>
@endsection

@section('content')

@include('inc.dashboard')


<div class="card">
    <div class="card-body">
        <form action="{{ route('plan-update', ['id'=>$plan->id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    <h3>Main</h2>
                    <p>Define the main settings of the plan.</p>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Plan Name</label>
                        <input type="text" class="form-control" name="plan_name" value="{{ $plan->plan_name }}" placeholder="Enter Plan Name">
                        @error('plan_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter Plan Price" value="{{ $plan->price }}">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Duration</label>
                        <input type="number" class="form-control" name="plan_duration" value="{{ $plan->duration }}" placeholder="Enter Plan Duration in Days">
                        @error('plan_duration')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="payment_status"  {{ $plan->is_payable == '1' ? 'checked':'' }}>
                        <label class="form-check-label">Plan Payment Status</label>
                        <div> <small class="form-text text-muted">Set Plan Payment Status </small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="plan_status" {{ $plan->status == '1'? 'checked':'' }}>
                        <label class="form-check-label">Visibility</label>
                        <div> <small class="form-text text-muted">it will be desplayed to users if set as visible</small></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-4">
                    <h3>Plan Settings</h3>
                    <p>Choose which features to enable for this plan.</p>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Total Biolink Limit</label>
                        <input type="number" class="form-control" name="biolinks_limit" placeholder="0" min="-1" value="{{ $settings->biolinks_limit }}">
                        <small class="form-text text-muted">The total amount of biolink pages that a user can create. Set -1 for unlimited.</small>
                        @error('biolinks_limit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Total Links Limit</label>
                        <input type="number" class="form-control" name="links_limit" placeholder="0" min="-1" value="{{ $settings->links_limit }}">
                        <small class="form-text text-muted">The total amount of links that a user can create (shorted links). Set -1 for unlimited.</small>
                        @error('links_limit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="deep_links" type="checkbox"  {{ $settings->deep_links == true ? 'checked':'' }}>
                        <label class="form-check-label">Deep Links</label>
                        <div> <small class="form-text text-muted">Enabling this will give the ability to the user to use deep links to point to specific apps instead of only http and https urls.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="custom_url" type="checkbox"  {{ $settings->custom_url == true ? 'checked':'' }}>
                        <label class="form-check-label"><?= language()->admin_plans->plan->custom_url ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->custom_url_help ?></small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="no_ads" {{ $settings->no_ads  == true ? 'checked':'' }}>
                        <label class="form-check-label">No Ads</label>
                        <div> <small class="form-text text-muted">Enabling this will make all people having this plan to not see any ads.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="removable_branding" {{ $settings->removable_branding  == true ? 'checked':'' }}>
                        <label class="form-check-label">Removable Footer Branding</label>
                        <div> <small class="form-text text-muted">This gives the option for people to remove branding from the biolinks footer.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="custom_colored_links" {{ $settings->custom_colored_links  == true ? 'checked':'' }}>
                        <label class="form-check-label">Colored Links</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to customize the color of their biolinks links</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="custom_backgrounds" {{ $settings->custom_backgrounds  == true ? 'checked':'' }}>
                        <label class="form-check-label">Custom Backgrounds</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to add custom backgrounds on their biolinks pages ( colors, gradients and actual images ).</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="custom_branding" {{ $settings->custom_branding  == true ? 'checked':'' }}>
                        <label class="form-check-label">Custom Footer Branding</label>
                        <div> <small class="form-text text-muted">This gives the option for people to add their custom branding for the biolinks footer.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="verified" {{ $settings->verified  == true ? 'checked':'' }}>
                        <label class="form-check-label">Verified Checkmark</label>
                        <div> <small class="form-text text-muted">Gives the user the verified checkmark on all their Biolink pages.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="temporary_url_is_enabled" {{ $settings->temporary_url_is_enabled  == true ? 'checked':'' }}>
                        <label class="form-check-label">Temporary URL</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to schedule links & limit clicks.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="socials" {{ $settings->socials  == true ? 'checked':'' }}>
                        <label class="form-check-label">Socials</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to add his social media accounts and be displayed below the biolink links.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="fonts" {{ $settings->fonts  == true ? 'checked':'' }}>
                        <label class="form-check-label">Fonts</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to pick a font of his liking from the list of extra fonts.</small></div>
                    </div>
                    <div class="form-check form-switch">
                        <input name="utm" type="checkbox" class="form-check-input" {{ $settings->utm  == true ? 'checked':'' }}>
                        <label class="form-check-label" ><?= language()->admin_plans->plan->utm ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->utm_help ?></small></div>
                    </div>
                      {{-- <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="sensitive_content" {{ old('sensitive_content') == 'on' ? 'checked':'' }}>
                        <label class="form-check-label">Sensitive  Content</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to enable a sensitive content warning on their links.</small></div>
                    </div> --}}
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="password" {{ $settings->password  == true ? 'checked':'' }}>
                        <label class="form-check-label">Password Protection</label>
                        <div> <small class="form-text text-muted">Gives the user the ability to password protect their links.</small></div>
                    </div>
                    <h4><b>Enabled Biolink Blocks</b></h4>
                    <p>Select which biolink page blocks are enabled for usage on this plan.</p>
                    <div class="row">
                        @foreach ($biolink_block as $key =>$item)
                    <div class="col-6 mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enabled_biolink_blocks[]" value="{{ $key }}" id="enabled_biolink_blocks_{{ $key }}" {{ $settings->enabled_biolink_blocks->$key ? 'checked':'' }}>
                            <label class="form-check-label text-capitalize">{{ $key }}</label>
                        </div>
                    </div>
                    @endforeach
                    <div class="form-group">

                    </div>
                    <button type="submit" name="submit" class="btn btn-block btn-primary mb-4">Update</button>
                    {{-- <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Update and Update Plan Subscribers as well</button> --}}

                    </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
