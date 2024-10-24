      <!-- partial:partials/_footer.html -->
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
          <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
          <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
      </footer>
      <!-- partial -->

      </div>
      </div>

      <!-- core:js -->
      <script src="{{asset('backend')}}/vendors/core/core.js"></script>
      <!-- endinject -->

      <!-- Plugin js for this page -->
      <script src="{{asset('backend')}}/vendors/flatpickr/flatpickr.min.js"></script>
      <script src="{{asset('backend')}}/vendors/apexcharts/apexcharts.min.js"></script>
      <!-- End plugin js for this page -->

      <!-- inject:js -->
      <script src="{{asset('backend')}}/vendors/feather-icons/feather.min.js"></script>
      <script src="{{asset('backend')}}/js/template.js"></script>
      <!-- endinject -->

      <!-- Custom js for this page -->
      <script src="{{asset('backend')}}/js/dashboard-dark.js"></script>
      <!-- End custom js for this page -->

      <!-- js toaster -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script>
          @if(Session::has('message'))
          var type = "{{ Session::get('alert-type','info') }}"
          switch (type) {
              case 'info':
                  toastr.info(" {{ Session::get('message') }} ");
                  break;

              case 'success':
                  toastr.success(" {{ Session::get('message') }} ");
                  break;

              case 'warning':
                  toastr.warning(" {{ Session::get('message') }} ");
                  break;

              case 'error':
                  toastr.error(" {{ Session::get('message') }} ");
                  break;
          }
          @endif
      </script>
      <!--End js toaster -->

      <!-- data table js -->
      <script src="{{asset('backend')}}/vendors/datatables.net/jquery.dataTables.js"></script>
      <script src="{{asset('backend')}}/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
      <script src="{{asset('backend')}}/js/data-table.js"></script>

      <!-- Multiple Image Show(property/add property)-->
      <script>
          $(document).ready(function() {
              $('#multiImg').on('change', function() { //on file input change
                  if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                  {
                      var data = $(this)[0].files; //this file data

                      $.each(data, function(index, file) { //loop though each file
                          if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type
                              var fRead = new FileReader(); //new filereader
                              fRead.onload = (function(file) { //trigger function on successful read
                                  return function(e) {
                                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                          .height(100); //create image element 
                                      $('#preview_img').append(img); //append image to output element
                                  };
                              })(file);
                              fRead.readAsDataURL(file); //URL representing the file's data.
                          }
                      });

                  } else {
                      alert("Your browser doesn't support File API!"); //if File API is absent
                  }
              });
          });
      </script>
      <!-- End image -->

      <!-- Multiple Image Select Js(property/add property) -->
      <script src="{{asset('backend')}}/vendors/inputmask/jquery.inputmask.min.js"></script>
      <script src="{{asset('backend')}}/vendors/select2/select2.min.js"></script>
      <script src="{{asset('backend')}}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <script src="{{asset('backend')}}/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>




      <script src="{{asset('backend')}}/js/inputmask.js"></script>
      <script src="{{asset('backend')}}/js/select2.js"></script>
      <script src="{{asset('backend')}}/js/typeahead.js"></script>
      <script src="{{asset('backend')}}/js/tags-input.js"></script>
      <!--End Multiple Image Select Js(property/add property) -->


      <!-- Editor(Tinymce) Js(property/add property) -->
      <script src="{asset('backend/js/tinymce.js')}}"></script>
      <script src="{asset('backend/vendors/tinymce/tinymce.min.js')}}"></script>
      <script src="{asset('backend/vendors/tinymce/tinymce.js')}}"></script>
      <!--End Editor(Tinymce) Js(property/add property) -->



      <!-- Add more Js(property/add property) -->

      <!----For Section-------->
      <script type="text/javascript">
          $(document).ready(function() {
              var counter = 0;
              $(document).on("click", ".addeventmore", function() {
                  var whole_extra_item_add = $("#whole_extra_item_add").html();
                  $(this).closest(".add_item").append(whole_extra_item_add);
                  counter++;
              });
              $(document).on("click", ".removeeventmore", function(event) {
                  $(this).closest("#whole_extra_item_delete").remove();
                  counter -= 1
              });
          });
      </script>
      <!--========== End of add multiple class with ajax ==============-->



      </body>

      </html>