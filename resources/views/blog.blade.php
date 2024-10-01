<!doctype html>
<html lang="en">

<head>
    <title>Car Rental Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    a {
        text-decoration: none !important;
    }

    .card-img-top {
        object-fit: contain;
        height: 200px;
        width: 100%;
        transition: transform 0.6s ease-in-out;
    }

    .card-img-top:hover {
        transform: scale(1.05);
    }
</style>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-around">
                <!-- Card 1 -->
                @foreach ($blogs as $blog)

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('blog.details.page', ['url' => $blog->blog_url]) }}">
                            <img src="{{ $blog->image }}" class="card-img-top" alt="Car Rental 1">
                        </a>
                        <div class="card-body">
                            <h6 class="text-primary">{{ $blog->blog_category->name ?? 'N/A' }}</h6>

                            <a href="{{ route('blog.details.page', ['url' => $blog->blog_url]) }}">
                                <h5 class="card-title text-dark">{{ $blog->title }}</h5>
                            </a>

                            <p class="text-primary">{{ $blog->blog_author->name ?? 'N/A' }} / {{
                                $blog->created_at->format('F d, Y') }}</p>

                            <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->short_description, 50) }}</p>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </section>

</body>

</html>
