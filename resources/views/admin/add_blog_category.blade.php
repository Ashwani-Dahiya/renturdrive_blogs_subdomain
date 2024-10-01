@include('admin.header')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Blog Categroy</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog Categroy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Categroy</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        <form
                                            action="{{ route('adm.add.blog.category.submit') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Categroy Name</label>
                                                        <input class="form-control" type="text" name="name" required>
                                                        @if ($errors->has('name'))
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit"
                                                        >Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Categroy</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">


                                            @if (session('update_success'))
                                            <div class="alert alert-success">
                                                {{ session('update_success') }}
                                            </div>
                                            @endif

                                            @if (session('update_error'))
                                            <div class="alert alert-danger">
                                                {{ session('update_error') }}
                                            </div>
                                            @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($blogCates as $index => $cat )
                                                    <tr>
                                                        <td>{{ $index+1 }}</td>
                                                        <td>{{ $cat->name }}</td>
                                                        <td><form method="POST"
                                                            action="{{ route('adm.del.blog.category', ['id' => $cat->id]) }}"
                                                            onsubmit="return confirm('Are you sure you want to delete this blog category ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger mt-1 ">
                                                                Delete
                                                            </button>
                                                        </form></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
