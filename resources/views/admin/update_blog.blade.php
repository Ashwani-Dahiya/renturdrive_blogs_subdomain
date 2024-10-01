@include('admin.header');
<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }
    .requied-tag{
        color: red;
    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Update Blog</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="#">
                                            Update Blog</a></li>
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
                                        <h5>Update Blog</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        {{-- Success message --}}
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        {{-- Error message --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form enctype="multipart/form-data" action="{{ route('adm.update.blog', ['id' => $blog->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">

                                                {{-- Blog Image --}}
                                                <div class="col-md-12 col-xs-12 text-center">
                                                    <div class="form-group">
                                                        <img class="rounded border" src="{{ $blog->image }}" alt="{{ $blog->image_alt }}" width="200" height="200">
                                                    </div>
                                                </div>

                                                {{-- Blog Category --}}
                                                <div class="col-md-3">
                                                    <label for="blog_category">Blog Category <span class="requied-tag">*</span></label>
                                                    <select name="blog_category" id="blog_category" class="form-control" required>
                                                        <option value="0">Select a category</option>
                                                        @foreach ($blogsCates as $cate)
                                                            <option value="{{ $cate->id }}" {{ $blog->category_id == $cate->id ? 'selected' : '' }}>
                                                                {{ $cate->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- Blog Author --}}
                                                <div class="col-md-3">
                                                    <label for="blog_author">Select Author <span class="requied-tag">*</span></label>
                                                    <select name="blog_author" id="blog_author" class="form-control" required>
                                                        <option value="0">Select an Author</option>
                                                        @foreach ($blogAuthers as $author)
                                                            <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                                                                {{ $author->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- Blog New Image --}}
                                                <div class="col-md-3">
                                                    <label for="new_image">New Image </label>
                                                    <input class="form-control" type="file" name="photo" id="new_image" accept=".png,.jpeg,.jpg,.webp">
                                                </div>
                                                {{-- Blog Image Alt --}}
                                                <div class="col-md-3">
                                                    <label for="image_alt">Image Alt <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="image_alt" id="image_alt" value="{{ $blog->image_alt }}" required>
                                                </div>

                                                {{-- Blog Title --}}
                                                <div class="col-md-12">
                                                    <label for="blog_title">Blog Title <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="blog_title" id="blog_title" value="{{ $blog->title }}" required>
                                                </div>

                                                {{-- Short Description --}}
                                                <div class="col-md-12">
                                                    <label for="short_description">Short Description <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="short_description" id="short_description" value="{{ $blog->short_description }}" required>
                                                </div>

                                                {{-- SEO Title --}}
                                                <div class="col-md-12">
                                                    <label for="seo_title">SEO Title <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="seo_title" id="seo_title" value="{{ $blog->seo_title }}" required>
                                                </div>

                                                {{-- SEO Description --}}
                                                <div class="col-md-12">
                                                    <label for="seo_description">SEO Description <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="seo_description" id="seo_description" value="{{ $blog->seo_description }}" required>
                                                </div>

                                                {{-- Blog URL --}}
                                                <div class="col-md-12">
                                                    <label for="blog_url">Blog URL <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="blog_url" id="blog_url" value="{{ $blog->blog_url }}" required>
                                                </div>

                                                {{-- Long Description --}}
                                                <div class="col-md-12">
                                                    <label for="long_description">Long Description <span class="requied-tag">*</span></label>
                                                    <textarea class="summernote" name="long_description" id="long_description" required>{{ base64_decode($blog->long_description) }}</textarea>
                                                </div>

                                                {{-- Update Button --}}
                                                <div class="col-md-12 mt-4">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>

                                            </div>
                                        </form>
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
