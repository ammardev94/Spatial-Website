<form id="contactForm" action="{{ route('site.enquiry.form') }}" method="POST" class="mt-lg-5 mt-3">
    @csrf
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="input-wrapper">
                <input class="form-control" type="text" name="name" placeholder="Your Name"
                    required />
                <div class="input-error"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-wrapper">
                <input class="form-control" type="email" name="mail" placeholder="Email"
                    required />
                <div class="input-error"></div>
            </div>
        </div>
    </div>
    <div class="row g-3 my-3">
        <div class="col-md-6">
            <div class="input-wrapper">
                <input type="tel" name="phone" class="form-control" placeholder="XXXXXXXXX"
                    required id="phone" />
                <div class="input-error"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-wrapper">
                <select class="form-control" name="inq_about" init-select required="required"
                    id="inq_about">
                    <option value="general-enquiry">General Inquiry</option>
                    <option value="sales-enquiry">Sales Inquiry</option>
                    <option value="customer-services">Customer Services</option>
                </select>
                <div class="input-error"></div>
            </div>
        </div>
        <div class="col-md-12 text-center mt-5">
            <button type="submit" class="butn btn-arrow-primary">
                <span>Submit
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="11"
                        viewBox="0 0 21 11" fill="none">
                        <path
                            d="M0.713471 4.42178L0.713472 5.84873L17.7215 5.84873L14.3869 9.18334L15.3989 10.1954L20.459 5.13525L15.3989 0.0751371L14.3869 1.08716L17.7215 4.42177L0.713471 4.42178Z"
                            fill="#1E1E1E" />
                    </svg>
                </span>
            </button>
        </div>
    </div>


    <input type="hidden" name="utm_source" id="utm_source">
    <input type="hidden" name="utm_medium" id="utm_medium">
    <input type="hidden" name="utm_campaign" id="utm_campaign">
    <input type="hidden" name="utm_term" id="utm_term">

    <input type="hidden" name="full_phone" id="full_phone1" />
    <input type="hidden" name="current_route" value="{{ Route::currentRouteName() }}">
    <input type="hidden" name="project_id" value="@if(!empty($project->id)){{ $project->id }}@endif">

</form>

@push('script')
<script>
    $(document).ready(function() {

        const params = new URLSearchParams(window.location.search);
        $('#utm_source').val(params.get('utm_source') || '');
        $('#utm_medium').val(params.get('utm_medium') || '');
        $('#utm_campaign').val(params.get('utm_campaign') || '');
        $('#utm_term').val(params.get('utm_term') || '');


        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            $('.alert').remove();

            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.html();
            
            // Phone validation using intl-tel-input
            const phoneInput = $("#phone");
            const iti = phoneInput.data('itiInstance');
            
            if (iti && !iti.isValidNumber()) {
                phoneInput.addClass("is-invalid");
                phoneInput.closest('.input-wrapper').addClass('has-error');
                phoneInput.closest('.input-wrapper').find('.input-error')
                    .html(`<div class="invalid-feedback" style="display: block;">Please enter a valid phone number.</div>`);
                return false;
            }
            
            // Clear previous phone errors
            phoneInput.removeClass("is-invalid");
            phoneInput.closest('.input-wrapper').removeClass('has-error');
            phoneInput.closest('.input-wrapper').find('.input-error').html('');

            submitBtn.prop('disabled', true).html('<span>Sending...</span>');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        form.before('<div class="alert alert-success text-center mt-3">' + response.message + '</div>');
                        form[0].reset();

                        if (response.flag) {
                            window.location = "{{ route('site.project.thankyou', ':slug') }}".replace(':slug', response.slug);
                        } else {
                            window.location = "{{ route('site.thankyou') }}";
                        }
                    } else {
                        form.before('<div class="alert alert-danger text-center mt-3">' + response.message + '</div>');
                    }
                    setTimeout(() => $(".alert").fadeOut(), 8000);
                },
                error: function(xhr) {

                    let errorMessage = 'Something went wrong. Please try again.';

                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            let errorHtml = '<div class="alert alert-danger mt-3"><h4 class="text-danger">Errors</h4><ul>';
                            $.each(errors, function(field, messages) {
                                errorHtml += `<li class="text-danger">${messages[0]}</li>`;

                                const $input = form.find(`[name="${field}"]`);
                                $input.addClass("is-invalid");
                                $input.closest('.input-wrapper').addClass('has-error');
                                $input.closest('.input-wrapper').find('.input-error')
                                    .html(`<div class="invalid-feedback">${messages[0]}</div>`);
                            });
                            errorHtml += '</ul></div>';

                            form.before(errorHtml);
                        } else if (xhr.responseJSON?.message) {

                            const errorMessage = `
                                <div class="alert alert-danger text-center mt-3">
                                    ${xhr.responseJSON.message}
                                </div>
                            `;
                            form.before(errorMessage);
                        }
                    } else if (xhr.status === 500) {
                        errorMessage = xhr.responseJSON?.message;
                    }
                    setTimeout(() => $(".alert").fadeOut(), 8000);
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    });
</script>
@endpush