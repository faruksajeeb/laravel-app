<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="card-box p-2 my-3">
        <div class="card mx-1">
            <div class="row ">
                <div class="col-md-8">
                    <div class="numbers">1,024</div>
                    <div class="card-name">Daily Views</div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row ">
                <div class="col-md-8">
                    <div class="numbers">1,024</div>
                    <div class="card-name">Daily Views</div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row ">
                <div class="col-md-8">
                    <div class="numbers">1,024</div>
                    <div class="card-name">Daily Views</div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row ">
                <div class="col-md-8">
                    <div class="numbers">1,024</div>
                    <div class="card-name">Daily Views</div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center border-start">
                    <div class="iconBox">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-md-stretch">
        <div class="col-md-3">
            <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                <h2>5000+</h2>
                <p>Daily Views</p>
                <div class="iconBox">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                <h2>1200</h2>
                <p>Sales</p>
                <div class="iconBox">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                <h2>2000</h2>
                <p>Purchase</p>
                <div class="iconBox">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 text-dark bg-white rounded-3 text-center">
                <h2>100</h2>
                <p>Comments</p>
                <div class="iconBox">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-4">Gutters</h2>
    <div class="row row-cols-1 row-cols-md-3 gx-4 m-1">
        <div class="col themed-grid-col text-center">
            <div class="iconBox">
                <i class="fa fa-eye"></i>
            </div>
            <div>
                <div class="numbers">1,024</div>
                <div class="card-name">Comments</div>
            </div>

        </div>
        <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
        <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
        <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
        <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
        <div class="col themed-grid-col"><code>.col</code> with <code>.gx-4</code> gutters</div>
    </div>
    <hr />
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title">Simple Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Joan Powell</td>
                                    <td>Associate Developer</td>
                                    <td>$450,870</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Gavin Gibson</td>
                                    <td>Account manager</td>
                                    <td>$230,540</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Julian Kerr</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>$55,300</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Cedric Kelly</td>
                                    <td>Accountant</td>
                                    <td>$234,100</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Samantha May</td>
                                    <td>Junior Technical Author</td>
                                    <td>$43,198</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
