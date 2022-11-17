<x-app-layout>
    <x-slot name="title">
        Basic Settings
    </x-slot>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header py-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Basic Settings</h3>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Default Country</label>
                                <select class="select form-control">
                                    <option selected="selected">USA</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date Format</label>
                                <select class="select form-control">
                                    <option value="d/m/Y">15/05/2016</option>
                                    <option value="d.m.Y">15.05.2016</option>
                                    <option value="d-m-Y">15-05-2016</option>
                                    <option value="m/d/Y">05/15/2016</option>
                                    <option value="Y/m/d">2016/05/15</option>
                                    <option value="Y-m-d">2016-05-15</option>
                                    <option value="M d Y">May 15 2016</option>
                                    <option selected="selected" value="d M Y">15 May 2016</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Timezone</label>
                                <select class="select form-control">
                                    <option>(UTC +5:30) Antarctica/Palmer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Default Language</label>
                                <select class="select form-control">
                                    <option selected="selected">English</option>
                                    <option>French</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Currency Code</label>
                                <select class="select form-control">
                                    <option selected="selected">USD</option>
                                    <option>Pound</option>
                                    <option>EURO</option>
                                    <option>Ringgit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Currency Symbol</label>
                                <input class="form-control" readonly value="$" type="text">
                            </div>
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
