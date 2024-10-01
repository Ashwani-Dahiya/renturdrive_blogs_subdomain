<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $blog->seo_title }}</title>
    <meta name="description" content="{{ $blog->seo_description }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $blog->image }}" type="image/x-icon">

    <style>
        a {
            text-decoration: none;
        }

        .blog-header-img {
            object-fit: contain;
            width: 100%;
            height: 400px;
            /* Adjust height as needed */
        }

        .blog-content {
            margin-top: 20px;
        }

        .blog-post-title {
            font-weight: 600;
            font-size: 2rem;
            color: #343a40;
        }

        .blog-post-meta {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .blog-body {
            font-size: 1.1rem;
            line-height: 1.8;
        }
    </style>

<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "Renturdrive",
      "url": "https://renturdrive.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        },
        "headline": "{{ $blog->seo_title }}",
        "description": "{{ $blog->seo_description }}",
        "image": "{{ $blog->image }}",
        "author": {
            "@type": "Person",
            "name": "{{ $blog->blog_author->name }}",
            "url": "{{ url('author/'.$blog->blog_author->name ) }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Renturdrive",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ $blog->image }}"
            }
        },
        "datePublished": "{{ $blog->created_at->toIso8601String() }}",
        "dateModified": "{{ $blog->updated_at->toIso8601String() }}"
    }
    </script>

    <!-- Add TypeScript Support -->
    <script src="https://cdn.jsdelivr.net/npm/typescript@4.0.2/lib/typescript.js"></script>
</head>

<body>
    <section class="container mt-5 p-5">
        <!-- Blog Header -->
        <div class="row">
            <div class="col-md-12">
                <img src="{{$blog->image }}" alt="{{ $blog->image_alt }}"
                    class="img-fluid blog-header-img">
            </div>
        </div>

        <!-- Blog Title and Meta -->
        <div class="row blog-content">
            <div class="col-md-12">
                <h1 class="blog-post-title">{{ $blog->title }}</h1>
                <p class="blog-post-meta text-primary">By {{ $blog->blog_author->name }} / {{ $blog->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="row">
            <div class="col-md-12 blog-body">
                <p>{{ $blog->short_description }}</p>

                <!-- Decode and display base64 encoded long description -->
                <p>{!! base64_decode($blog->long_description) !!}</p>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- Add TypeScript for dynamic content rendering -->
    <script type="text/typescript">
        // Example TypeScript function to dynamically update image alt attribute
        function updateBlogImageAlt(newAlt: string) {
            const blogImage = document.querySelector('.blog-header-img') as HTMLImageElement;
            if (blogImage) {
                blogImage.alt = newAlt;
            }
        }

        // You can call this function dynamically based on content logic
        updateBlogImageAlt('{{ $blog->image_alt }}');
    </script>

</body>

</html>
