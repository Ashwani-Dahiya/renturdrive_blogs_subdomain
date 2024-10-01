<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $blog->seo_title }}</title>
    <meta name="description" content="{{ $blog->seo_description }}">

    <link rel="stylesheet" href="{{ asset('assets/css/boot.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $blog->image }}" type="image/x-icon">

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
    <nav class="shadow p-3 mb-1 bg-white">
        <ul class="nav justify-content-center p-2">
            <li class="nav-item">
                <a href="{{ route('home') }}"><img src="{{ asset('logo/logo2.webp') }}" alt="" width="100"></a>
            </li>
        </ul>
    </nav>
    <section class="py-3 py-md-5 py-xl-8 bg-light">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <h2 class="h4 mb-4 mb-md-5">Blog Details</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <article>
                <div class="card border-light-subtle">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 order-1 order-md-0 d-flex align-items-center">
                            <div class="card-body p-md-4 p-xl-6 p-xxl-9">
                                <div class="entry-header mb-3">
                                    <ul class="entry-meta list-unstyled d-flex mb-4">
                                        <li>
                                            <a
                                                class="d-inline-flex px-2 py-1 link-accent text-accent-emphasis bg-accent-subtle border border-accent-subtle rounded-2 text-decoration-none fs-7">{{
                                                $blog->blog_category->name }}</a>
                                        </li>
                                    </ul>
                                    <h5 class="card-title entry-title display-4 fw-bold mb-4 lh-1">
                                        <a class="link-dark text-decoration-none">{{ $blog->title }}</a>
                                    </h5>
                                </div>
                                <p class="card-text entry-summary text-secondary mb-4">
                                    {{ $blog->short_description }}
                                </p>
                                <div class="entry-footer">
                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                        <li>
                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg>
                                                <span class="ms-2 fs-7">{{ $blog->created_at->format('F d, Y') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3">&bull;</span>
                                        </li>
                                        <li>
                                            <a class="link-secondary text-decoration-none d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM2 13s-1 0-1-1 1-4 7-4 7 4 7 4 1 0 1 1-1 1H2z" />
                                                </svg>
                                                <span class="ms-2 fs-7">by {{ $blog->blog_author->name ?? 'N/A'
                                                    }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <img class="img-fluid object-fit-contain rounded-end" loading="lazy" src="{{$blog->image }}"
                                alt="{{ $blog->image_alt }}">
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>


    <section class="container p-5">
        <div class="row">
            <p>{!! base64_decode($blog->long_description) !!}</p>
        </div>
        </div>
    </section>
    <footer class="footer">
        <div class="bg-light py-3 py-md-2 py-xl-8 border-top border-light-subtle">
            <div class="container overflow-hidden">
                <div class="row gy-3 gy-md-5 gy-xl-0 align-items-center justify-content-center">
                    <div class="col-xs-12 col-sm-6 col-xl-3 order-0 order-xl-0">
                        <div class="footer-logo-wrapper text-center text-sm-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('logo/logo2.webp') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-3 py-md-5 border-top border-light-subtle">
            <div class="container overflow-hidden">
                <div class="row">
                    <div class="col">
                        <div class="footer-copyright-wrapper text-center">
                            &copy; 2024. All Rights Reserved.
                        </div>
                        <div class="credits text-secondary text-center mt-2 fs-7">
                            Built by <a href="https://renturdrive.com/"
                                class="link-secondary text-decoration-none">renturdrive</a> with <span
                                class="text-primary">&#9829;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

</body>

</html>
