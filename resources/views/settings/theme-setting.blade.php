<x-app-layout>
    <x-slot name="title">
        Theme Settings
    </x-slot>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header py-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Theme Settings</h3>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Website Name</label>
                        <div class="col-lg-9">
                            <input name="website_name" class="form-control" value="Dreamguy's Technologies"
                                type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Light Logo</label>
                        <div class="col-lg-7">
                            <input type="file" class="form-control">
                            <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                        </div>
                        <div class="col-lg-2">
                            <div class="img-thumbnail float-end"><img src="assets/img/logo2.png" alt=""
                                    width="40" height="40"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Favicon</label>
                        <div class="col-lg-7">
                            <input type="file" class="form-control">
                            <span class="form-text text-muted">Recommended image size is 16px x 16px</span>
                        </div>
                        <div class="col-lg-2">
                            <div class="settings-image img-thumbnail float-end"><img src="assets/img/logo2.png"
                                    class="img-fluid" width="16" height="16" alt=""></div>
                        </div>
                    </div>
                    <br>
                    <div class="submit-section">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-lg btn-outline-secondary submit-btn rounded-pill">Save
                                Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
