<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets_pluginAdmin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets_pluginAdmin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/vendors/flot/jquery.flot.stack.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets_pluginAdmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/js/misc.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/js/settings.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets_pluginAdmin/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
{{-- <script src="{{ asset('assets_pluginAdmin/js/dataTables.bootstrap4.js') }}"></script> --}}
<script src="{{ asset('assets_pluginAdmin/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets_pluginAdmin/js/data-table.js') }}"></script>
{{-- js datatable --}}
<script
src="https://demo.bootstrapdash.com/plus-admin/themes/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js">
</script>

<script>
    $(document).ready(function() {
    //     $('.detail-layanan').on('click', function() {
    //         var id = $(this).data('id'); // Ensure you have data-id attribute in your button or element
    //         $.ajax({
    //             url: '{{ route('detail', '') }}/' + id,
    //             type: 'GET',
    //             success: function(response) {
    //                 $('.ID_LAYANAN').val(response[0].ID_LAYANAN);
    //                 $('.EMAIL').val(response[0].EMAIL);
    //                 $('.TELEPON').val(response[0].TELEPON);
    //                 $('.NAMA').val(response[0].NAMA);
    //                 $('.SUBJEK').val(response[0].SUBJEK);
    //                 $('.KANAL').val(response[0].KANAL).trigger(
    //                     'change');
                        
    //                     //$('#detailModal .modal-body').html(modalBody);
    //                     $('#detailModal').modal('show');
    //                 },
    //         error: function(xhr) {
    //             Swal.fire({
    //                 title: 'Error!',
    //                 text: 'Gagal mengambil data',
    //                 icon: 'error',
    //                 confirmButtonText: 'OK'
    //             });
    //         }
    //     });
    // });
});


</script>

@yield('section_js')