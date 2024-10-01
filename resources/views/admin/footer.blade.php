<script src="{{ asset('adm/js/plugins/popper.min.js') }}"></script>
{{-- <!-- <script src="assets/js/plugins/perfect-scrollbar.min.js"></script> --> --}}
<script src="{{ asset('adm/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('adm/js/pcoded.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <!-- <script src="assets/js/plugins/apexcharts.min.js"></script> --> --}}
{{-- <!-- <script src="assets/js/menu-setting.js"></script> --> --}}
<script src="{{ asset('adm/js/plugins/simple-datatables.js') }}"></script>

 <script src="{{ asset('adm/js/pages/dashboard-main.js') }}"></script>
 <script>
    const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
</script>
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>
{{-- <script src="https://cdn.tiny.cloud/1/wln99aphd9dj5ezcjd4mvkjigya9c3sig5fsue36w8h0avvw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.summernote',
        plugins: ' anchor autolink charmap codesample emoticons image link lists media table',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        apiKey: 'wln99aphd9dj5ezcjd4mvkjigya9c3sig5fsue36w8h0avvw',
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });

    $(document).ready(function() {
        // When 'Add More' button is clicked
        $('#addMore').on('click', function() {
            // Create a new section of Qua and Ans with a remove button
            var newFaq = `
                <div class="row faq-item">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="form-label">Qua: </label>
                            <input type="text" class="form-control" name="qua[]">
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="form-label">Ans: </label>
                            <textarea class="form-control" name="ans[]" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger btn-sm remove-faq" style="float: right">Remove</button>
                    </div>
                </div>`;

            // Append the new section to the form
            $('#faqSection').append(newFaq);
        });

        // Functionality to remove the respective section
        $(document).on('click', '.remove-faq', function() {
            $(this).closest('.faq-item').remove(); // Removes the closest parent '.faq-item' div
        });
    });
</script> --}}
</body>

</html>
