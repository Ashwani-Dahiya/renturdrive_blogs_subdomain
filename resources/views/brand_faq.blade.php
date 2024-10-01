<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/faqs/faq-3/assets/css/faq-3.css">
</head>

<body>

    <section class="mt-2">
        <div class="container">
            <!-- FAQ 3 - Bootstrap Brain Component -->
            <section class="bsb-faq-3 py-3 py-md-5 py-xl-8">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                            <h2 class="mb-4 display-5 text-center">Brand Frequently Asked Questions</h2>
                            <p class="text-secondary text-center lead fs-4">Welcome to our FAQ page, your one-stop
                                resource for answers to commonly asked questions.</p>
                            {{-- <p class="mb-5 text-center">Whether you're a new customer looking to learn more about what
                                we offer or a long-time user seeking clarification on specific topics, this page has
                                clear and concise information about our products and services.</p> --}}
                            {{-- <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle"> --}}
                        </div>
                    </div>
                </div>

                <!-- FAQs: My Account -->
                <div class="mb-8">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-11 col-xl-10">
                                <div class="d-flex align-items-center mb-5">
                                    <img src="{{ asset(''.$brand->logo) }}" alt="" class="me-3 lh-1 display-5"
                                        style="width: 60px; height:60px; object-fit:contain;">
                                    <h3 class="m-0">{{ $brand->name }}</h3>
                                </div>
                            </div>

                            <div class="col-11 col-xl-10">
                                <div class="accordion accordion-flush" id="faqAccount">
                                    @forelse ($faqs as $index => $faq)
                                        <div class="accordion-item bg-transparent border-top border-bottom py-3">
                                            <h2 class="accordion-header" id="faqAccountHeading{{ $index + 1 }}">
                                                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faqAccountCollapse{{ $index + 1 }}" aria-expanded="false"
                                                    aria-controls="faqAccountCollapse{{ $index + 1 }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="faqAccountCollapse{{ $index + 1 }}" class="accordion-collapse collapse"
                                                aria-labelledby="faqAccountHeading{{ $index + 1 }}">
                                                <div class="accordion-body">
                                                    <p>{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No FAQs available for this brand.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
