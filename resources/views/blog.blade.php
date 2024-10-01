<!doctype html>
<html lang="en">

<head>
    <title>Renturdrive Car Rental Blog | Complete Information of Cars</title>
	<meta name="description" content="Stay updated with latest news &amp; tips on car rentals dubai through our blog. Discover best rental options &amp; essential driving tips to make your experience seamless." />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('logo/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/boot.css') }}">

</head>


<body style="background: #f5f5f5">
    <nav class="shadow p-3 mb-3 bg-white">
        <ul class="nav justify-content-center p-2">
            <li class="nav-item">
                <a href="{{ route('home') }}"><img src="{{ asset('logo/logo2.webp') }}" alt="" width="100"></a>
            </li>
        </ul>
    </nav>

    <main>

        <section class="bsb-blog-5 py-3 py-md-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12">
                        <h2 class="h4 mb-4 mb-md-5">Blogs</h2>
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-3 gx-xl-4 gy-xl-4 gx-xxl-6 gy-xxl-5">
                    @foreach ($blogs as $blog)
                    <div class="col-12 col-lg-4 ">
                        <article>
                            <div class="card border-1 shadow p-2  bg-transparent">
                                <figure class="card-img-top mb-4 overflow-hidden bsb-overlay-hover">
                                    <a href="{{ route('blog.details.page', ['url' => $blog->blog_url]) }}">
                                        <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ $blog->image }}" alt="{{ $blog->image_alt }}" >
                                    </a>
                                    <figcaption>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-eye text-white bsb-hover-fadeInLeft"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                        <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                                    </figcaption>
                                </figure>
                                <div class="card-body m-0 p-0">
                                    <div class="entry-header mb-3">
                                        <ul class="entry-meta list-unstyled d-flex mb-3">
                                            <li>
                                                <a class="d-inline-flex px-2 py-1 link-accent text-accent-emphasis bg-accent-subtle border border-accent-subtle rounded-2 text-decoration-none fs-7"
                                                    href="{{ route('blog.details.page', ['url' => $blog->blog_url]) }}">{{ $blog->blog_category->name }}</a>
                                            </li>
                                        </ul>
                                        <h2 class="card-title entry-title h4 m-0">
                                            <a class="link-dark text-decoration-none" href="{{ route('blog.details.page', ['url' => $blog->blog_url]) }}">{{ $blog->title }}</a>
                                        </h2>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->short_description, 50) }}</p>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-transparent p-0 m-0">
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
                                                <span class="ms-2 fs-7">{{
                                                    $blog->created_at->format('F d, Y') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3">&bull;</span>
                                        </li>
                                        <li>
                                            <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM2 13s-1 0-1-1 1-4 7-4 7 4 7 4 1 0 1 1-1 1H2z"/>
                                                </svg>
                                                <span class="ms-2 fs-7">by {{ $blog->blog_author->name ?? 'N/A' }}</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach

                </div>
            </div>

        </section>

    </main>



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
