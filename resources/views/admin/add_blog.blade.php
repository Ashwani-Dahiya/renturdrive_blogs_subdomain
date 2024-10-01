@include('admin.header')

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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Add Blog</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Add Blog</a></li>
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
                                        <h5>Add Blog</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        {{-- Success message --}}
                                        @if(session('success'))
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

                                        <form action="{{ route('adm.add.blog.post') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="blog_category">Blog Category <span class="requied-tag">*</span></label>
                                                    <select name="blog_category" id="blog_category" class="form-control" required>
                                                        <option value="0" {{ old('blog_category') == 0 ? 'selected' : '' }}>Select a category</option>
                                                        @foreach ($blogsCates as $cate)
                                                            <option value="{{ $cate->id }}" {{ old('blog_category') == $cate->id ? 'selected' : '' }}>
                                                                {{ $cate->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- Show error for blog category --}}
                                                    @error('blog_category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="blog_author">Select Author <span class="requied-tag">*</span></label>
                                                    <select name="blog_author" id="blog_author" class="form-control" required>
                                                        <option value="0" {{ old('blog_author') == 0 ? 'selected' : '' }}>Select a Author</option>
                                                        @foreach ($blogAuthers as $author)
                                                            <option value="{{ $author->id }}" {{ old('blog_author') == $author->id ? 'selected' : '' }}>
                                                                {{ $author->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- Show error for blog author --}}
                                                    @error('blog_author')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="image">Image <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="file" name="photo" id="image" required>
                                                    {{-- Show error for photo --}}
                                                    @error('photo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="image_alt">Image Alt <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="image_alt" id="image_alt" value="{{ old('image_alt') }}" required>
                                                    {{-- Show error for image alt --}}
                                                    @error('image_alt')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="blog_title">Blog Title <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="blog_title" id="blog_title" value="{{ old('blog_title') }}" required>
                                                    {{-- Show error for blog title --}}
                                                    @error('blog_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>



                                                <div class="col-md-12">
                                                    <label for="short_description">Short Description <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="short_description" id="short_description" value="{{ old('short_description') }}" required>
                                                    {{-- Show error for short description --}}
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="seo_title">SEO Title <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}" required>
                                                    {{-- Show error for SEO title --}}
                                                    @error('seo_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="seo_description">SEO Description <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="seo_description" id="seo_description" value="{{ old('seo_description') }}" required>
                                                    {{-- Show error for SEO description --}}
                                                    @error('seo_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="blog_url">Blog URL <span class="requied-tag">*</span></label>
                                                    <input class="form-control" type="text" name="blog_url" id="blog_url" value="{{ old('blog_url') }}" required>
                                                    {{-- Show error for blog URL --}}
                                                    @error('blog_url')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="long_description">Long Description <span class="requied-tag">*</span></label>
                                                    <textarea class="summernote" name="long_description" id="long_description" required rows="20">{{ old('long_description') }}</textarea>
                                                    {{-- Show error for long description --}}
                                                    @error('long_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <br>
                                                </div>

                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>
@include('admin.footer')
