</div>
<!-- END APP CONTENT -->

</div>
<!-- END APP CONTAINER -->

<!-- START APP FOOTER -->
<div class="app-footer app-footer-default" id="footer">

<div class="container container-boxed">
    <div class="app-footer-line">
        <div class="copyright">&copy; 2016 Boooya. All right reserved in the Ukraine and other countries.</div>
        <div class="pull-right">
            <ul class="list-inline">
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">API</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
    </div>
</div>

</div>
<!-- END APP FOOTER -->

</div>
<!-- END APP WRAPPER -->

<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="{{asset('Backend/js/vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<!-- END IMPORTANT SCRIPTS -->
<!-- THIS PAGE SCRIPTS -->
<script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/js/vendor/rickshaw/d3.v3.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/rickshaw/rickshaw.min.js')}}"></script>
<!-- END THIS PAGE SCRIPTS -->
<script type="text/javascript" src="{{asset('Backend/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

{{-- Date Pciker --}}
<script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/select2/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/bootstrap-daterange/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/dropzone/dropzone.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/cropper/cropper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/form-validator/jquery.form-validator.min.js')}}"></script>

<!-- APP SCRIPTS -->
<script type="text/javascript" src="{{asset('Backend/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/app_plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/app_demo.js')}}"></script>
<!-- END APP SCRIPTS -->
<script type="text/javascript" src="{{asset('Backend/js/app_demo_dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/form-validator/jquery.form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/js/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $.validate({
        modules : 'date,file,location',
        onValidate: function(){

            delayBeforeFire(function(){
                app.spy();
            },100);

        }
    });

</script>

<script type="text/javascript">
$(document).ready(function(){
    @foreach (App\User::all() as $user)


    $("#userstat{{ $user->id }}").change(function(){
      var id = "{{ $user->id }}";
      var stat = $("#userstat{{ $user->id }}").val();
      if(stat == ""){
      }else{
        $.ajax({
          type:"get",
          url: "{{Route('user.change.status')}}",
          data:{id:id, status:stat},
          success:function(data){

            window.location.reload();
          }
        });
      }

    });
    @endforeach


  });
</script>
<script type="text/javascript">
$("#modal-change-photo .close").click(function(){
  window.location.reload();
});
@foreach (App\Backend\UserNotification::all() as $userMessage)

$("#usermessagedismiss{{ $userMessage->id }}").click(function(){
    var userid = $(this).attr('date-userid');
    var messageid = $(this).attr('date-id');
  $.ajax({
    type:"get",
    url: "{{Route('user.message.status')}}",
    data:{id:messageid, user_id:userid },
    success:function(data){

      console.log(data);
    },
    error:function(data){
        console.log(data);
    }
  });
});
@endforeach

</script>

</body>
</html>
