<!--begin::Input group-->
<div class="fv-row">
    <!--begin::Dropzone-->
    <div class="dropzone" id="kt_dropzonejs_example_1">
        <!--begin::Message-->
        <div class="dz-message needsclick">
            <!--begin::Icon-->
            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
            <!--end::Icon-->

            <!--begin::Info-->
            <div class="ms-4">
                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>

            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Dropzone-->
</div>
<!--end::Input group-->

<script>
    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });
</script>
