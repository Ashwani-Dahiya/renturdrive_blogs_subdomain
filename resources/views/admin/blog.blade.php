@include('admin.header');

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">All Blogs</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="#">
                                            All Blogs</a></li>
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
                                        <h5>All Blogs</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}

                                            </div>
                                            @endif
                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}

                                            </div>
                                            @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Author</th>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($blogs as $index=> $blog )
                                                    <tr>
                                                        <td>
                                                            {{ $index+1 }}
                                                        </td>
                                                        <td>
                                                            {{ $blog->blog_author->name }}
                                                        </td>
                                                        <td>
                                                            {{ $blog->title }}
                                                        </td>
                                                        <td>
                                                            <div class="user-icon">
                                                                <img src="{{ $blog->image }}"
                                                                    style="height: 50px; width: 50px">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $blog->created_at->format('F d, Y') }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('adm.update.blog.page', ['id' => $blog->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary">Update</button>
                                                            </form>
                                                            <form method="POST"
                                                                action="{{ route('adm.del.blog', ['id' => $blog->id]) }}"
                                                                onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger mt-1 ">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>
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
