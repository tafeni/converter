<script src="{{asset('admin/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('admin/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin/js/core/app.js')}}"></script>
<script src="{{asset('admin/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
<script>
    $(function(){
        sizes = $(window).width();

        if (sizes > 670){
            $('img#logo').attr('width','168%')
        }
        else if(sizes >= 200 || sizes <= 670){
            $('img#logo').attr('width','110%')
        }
        else{

        }
    })
</script>
