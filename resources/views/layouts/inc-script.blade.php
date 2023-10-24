
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ url('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ url('admin/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ url('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ url('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ url('admin/assets/js/custom/apps/file-manager/list.js') }}"></script>
<script src="{{ url('admin/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/widgets.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ url('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    @if ($message = Session::get('add_success'))
    Swal.fire({
        text: "ระบบได้ทำการอัพเดทข้อมูลสำเร็จ!",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    @endif

    @if ($message = Session::get('edit_success'))
    Swal.fire({
        text: "ระบบได้ทำการอัพเดทข้อมูลสำเร็จ!",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    @endif
    
    @if ($message = Session::get('del_success'))
    Swal.fire({
        text: "ระบบได้ทำการลบข้อมูลสำเร็จ!",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    @endif

    @if ($message = Session::get('edit_error'))
    Swal.fire({
        text: "ไม่สามารถลบรายการนี้ได้!",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    @endif

    

</script>
<!--end::Custom Javascript-->
<!--end::Javascript-->