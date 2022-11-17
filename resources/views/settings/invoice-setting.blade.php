<x-app-layout>
    <x-slot name="title">
        Invoice Settings
    </x-slot>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header py-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Invoice Settings</h3>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group row my-3">
                        <label class="col-lg-3 col-form-label">Invoice prefix</label>
                        <div class="col-lg-9">
                            <input type="text" value="INV" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row my-3">
                        <label class="col-lg-3 col-form-label">Invoice Logo</label>
                        <div class="col-lg-7">
                            <input type="file" class="form-control">
                            <span class="form-text text-muted">Recommended image size is 200px x 40px</span>
                        </div>
                        <div class="col-lg-2">
                            <div class="img-thumbnail float-end"><img src="assets/img/logo3.png" class="img-fluid"
                                    alt="" width="140" height="40"></div>
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
